import { Table, Icon, Modal, Button, Popconfirm } from 'antd';
import 'antd/lib/index.css';
import reqwest from 'reqwest';

import Breadcrumb from './breadcrumb';

const columns = [
    {key: 'id', title: 'ID', dataIndex: 'id', sorter: true},
    {key: 'permission_name', title: '权限名', dataIndex: 'permission_name', sorter: true},
    {key: 'permission_slug', title: '权限slug', dataIndex: 'permission_slug'},
    {key: 'permission_description', title: '权限描述', dataIndex: 'permission_description'},
    {key: 'created_at', title: '创建时间', dataIndex: 'created_at', sorter: true},
    {key: 'updated_at', title: '更新时间', dataIndex: 'updated_at', sorter: true},
    {key: 'operation', title: '操作', render: function(text, record, index) {
        return (
            <RowAction data={record} />
        )
    }}
];

const RowAction = React.createClass({
    getInitialState() {
        return {
            data: [],
            popConfirmVisible: false
        };
    },
    componentWillMount: function () {
        //this.setState({data: this.props.data});
    },
    handleEdit(data) {
        console.log("edit:", data);
        //return <Modal title="test" visible="true"><p>sdfsdfsd</p></Modal>
    },
    handleDelete(index) {
        console.log('handle delete:', index);
        //this.setState({popConfirmVisible: true});
        return (
            <Popconfirm title="确定要删除这个任务吗？">
                <a href="#">删除</a>
            </Popconfirm>
        );
    },
    //cancelDelete(index) {
    //    this.setState({popConfirmVisible: false});
    //},
    //confirmDelete(index) {
    //    reqwest({
    //        url: '/admin/auth/user/' + index,
    //        method: 'DELETE',
    //        type: 'json',
    //        data: {_token: _token},
    //        success: (result) => {
    //            this.fetch();
    //        }
    //    });
    //},
    render() {
        return (
            <div>
                <a href="javascript:;" data-id={this.props.data.id}>编辑</a>
                <span className="ant-divider"></span>
                <a href="javascript:;" data-id={this.props.data.id}>删除</a>
            </div>
        );
    }
});

const Permission = React.createClass({
    getInitialState() {
        return {
            data: [],
            pagination: {},
            loading: false,
            popConfirmVisible: false
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
            url: '/admin/auth/permission',
            method: 'get',
            data: params,
            type: 'json',
            success: (result) => {
                const pagination = this.state.pagination;
                pagination.total = result.total;
                this.setState({
                    loading: false,
                    data: result.data,
                    pagination
                });
            }
        });
    },
    componentDidMount() {
        this.fetch();
    },
    handleOk() {

    },
    handleCancel() {

    },
    render() {
        const rowKey = function(record) {
            return record.id;
        };
        return (
            <Table rowKey={rowKey}
                   columns={columns}
                   dataSource={this.state.data}
                   pagination={this.state.pagination}
                   loading={this.state.loading}
                   onChange={this.handleTableChange} />
        );
    }
});

ReactDOM.render(<Breadcrumb  />, document.getElementById('breadcrumb'));
ReactDOM.render(<Permission />, document.getElementById('content'));
