import { Table, Form, Select, Input, DatePicker, Switch,
    Slider, Button, message, Row, Col, Upload, Icon, Modal, Popconfirm, notification, TreeSelect } from 'antd';
import 'antd/lib/index.css';
import reqwest from 'reqwest';

import Breadcrumb from './breadcrumb';

const FormItem = Form.Item;
const Option = Select.Option;

const User = React.createClass({
    getInitialState() {
        return {
            data: [],
            formData: [],
            columns: [],
            pagination: {},
            loading: false,
            modalVisible: false,
            popConfirmVisible: false,
            currentRoles: [],
            rolesData: []
        };
    },
    handleTableChange(pagination, filters, sorter) {
        const pager = this.state.pagination;
        pager.current = pagination.current;
        this.setState({
            pagination: pager
        });
        const params = {
            pageSize: pagination.pageSize,
            page: pagination.current,
            sortField: sorter.field,
            sortOrder: sorter.order
        };
        for (let key in filters) {
            params[key] = filters[key];
        }
        this.fetch(params);
    },
    fetch(params = {}) {
        console.log('请求参数：', params);
        this.setState({ loading: true });
        reqwest({
            url: '/admin/auth/user',
            method: 'get',
            data: params,
            type: 'json',
            success: (result) => {
                console.log('----', result);
                const pagination = this.state.pagination;
                pagination.total = result.data.user.total;
                this.setState({
                    loading: false,
                    data: result.data.user.users,
                    rolesData: result.data.roles,
                    pagination
                });
            }
        });
    },
    componentDidMount() {
        this.fetch();
    },
    handleOk() {
        this.setState({modalVisible: false});
        console.log('handle ok:', this.state.formData);
        reqwest({
            url: '/admin/auth/user/' + this.state.formData.id,
            method: 'PUT',
            data: {username: this.state.formData.username, email: this.state.formData.email, 'assignees_roles[]': 1, _token: _token},
            type: 'json',
            success: (result) => {
                console.log('update user:', result);
                if (result.status != 200) {
                    message.error('更新失败');
                } else {
                    message.success('更新成功');
                    this.fetch();
                }

            }
        });
    },
    handleCancel() {
        this.setState({modalVisible: false});
    },
    handleEditClick(record, event) {
        console.log('--------xxxxx:', record);
        riiiiiiiiiiiiiiiiiiii
        this.setState({formData: record, modalVisible: true});
        event.stopPropagation();
    },
    handleDelete(index, id) {
        const self = this;
        self.setState({popConfirmVisible: true});
    },
    cancelDelete(index) {
        this.setState({popConfirmVisible: false});
    },
    confirmDelete(index) {
        reqwest({
            url: '/admin/auth/user/' + index,
            method: 'DELETE',
            type: 'json',
            data: {_token: _token},
            success: (result) => {
                this.fetch();
            }
        });
    },
    handleFieldChange(e) {
        var formData = this.state.formData;
        switch (e.target.name) {
            case 'username':
                formData.username = e.target.value;
                break;
            case 'email':
                formData.email = e.target.value;
                break;
        }
        console.log('formData:', formData);
        this.setState({formData: formData});
    },
    onTreeChange(value) {
        console.log('onChange ', value, arguments);
        this.setState({ currentRoles: value });
    },
    renderAction(text, record, index) {
        return (
            <div>
                <a href="javascript:;" onClick={this.handleEditClick.bind(this, record)}>编辑</a>
                <span className="ant-divider"></span>
                <a href="javascript:;" onClick={this.handleDelete.bind(this, index, record.id)}>删除</a>
            </div>
        );
    },
    render() {
        const rowKey = function(record) {
            return record.id;
        };

        var columns = [
            {key: 'id', title: 'ID', dataIndex: 'id', sorter: true},
            {key: 'username', title: '用户名', dataIndex: 'username', sorter: true},
            {key: 'roles', title: '拥有的角色', dataIndex: 'roles', render: function(text, record) {
                //console.log('roles:', record.roles);
                var roleStr = '';
                if (record.roles.length > 0) {
                    for (var index in record.roles) {
                        roleStr += record.roles[index].role_name + '(' + record.roles[index].role_slug + ')' + '<br />';
                    }
                } else {
                    roleStr += '--';
                }
                return (<div dangerouslySetInnerHTML={{__html: roleStr}}></div>)
            }},
            {key: 'email', title: 'Email', dataIndex: 'email'},
            {key: 'created_at', title: '创建时间', dataIndex: 'created_at', sorter: true},
            {key: 'updated_at', title: '更新时间', dataIndex: 'updated_at', sorter: true},
            {key: 'deleted_at', title: '删除时间', dataIndex: 'deleted_at'},
            {key: 'status', title: '状态', dataIndex: 'status', render: function(text){
                var status =  (text == 1) ? '正常' : '已删除';
                return (<div>{status}</div>)
            }},
            {key: 'operation', title: '操作', render: this.renderAction}
        ];

        var treeData = this.state.rolesData;
        const tProps = {
            treeData,
            value: this.state.currentRoles,
            onChange: this.onTreeChange,
            multiple: true,
            treeCheckable: true,
            treeDefaultExpandAll: true,
            style: {
                width: 360
            }
        };

        return <div>
            <Row>
                <Col>
                    <Table rowKey={rowKey}
                           columns={columns}
                           dataSource={this.state.data}
                           pagination={this.state.pagination}
                           loading={this.state.loading}
                           onChange={this.handleTableChange}
                    />
                </Col>
            </Row>
            <Row>
                <Col>
                    <Modal
                        title="用户信息"
                        visible={this.state.modalVisible}
                        onOk={this.handleOk}
                        onCancel={this.handleCancel}>
                        <Form horizontal >
                            <FormItem
                                label="用户名"
                                labelCol={{span: 6}}
                                wrapperCol={{span: 12}}>
                                <Input size="large" style={{width:200}} value={this.state.formData.username} name="username" onChange={this.handleFieldChange} />
                            </FormItem>
                            <FormItem
                                label="Email"
                                labelCol={{span: 6}}
                                wrapperCol={{span: 12}}>
                                <Input size="large" style={{width:200}} value={this.state.formData.email} name="email"  onChange={this.handleFieldChange} />
                            </FormItem>
                            <FormItem
                                label="拥有的角色"
                                labelCol={{span: 6}}
                                wrapperCol={{span: 12}}>
                                <TreeSelect {...tProps} />
                            </FormItem>
                        </Form>
                    </Modal>
                </Col>
            </Row>
            <Row>
                <Col>

                </Col>
            </Row>
        </div>;
    }
});

ReactDOM.render(<Breadcrumb  />, document.getElementById('breadcrumb'));
ReactDOM.render(<User />, document.getElementById('content'));
