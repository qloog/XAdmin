import React from 'react';
import ReactDOM from 'react-dom';
import 'antd/lib/index.css';
import {Button, Form, Row, Col, Input, message} from 'antd';
const createForm = Form.create;
const FormItem = Form.Item;

function noop() {
    return false;
}

let Login = React.createClass({

    getInitialState() {
        return {
            status: {
                email: {},
                password: {}
            },
            formData: {
                email: undefined,
                password: undefined,
                _token: _token
            }
        };
    },

    getValidateStatus(field) {
        const { isFieldValidating, getFieldError, getFieldValue } = this.props.form;

        if (isFieldValidating(field)) {
            return 'validating';
        } else if (!!getFieldError(field)) {
            return 'error';
        } else if (getFieldValue(field)) {
            return 'success';
        }
    },

    handleReset(e) {
        e.preventDefault();
        this.props.form.resetFields();
    },

    handleSubmit(e) {
        e.preventDefault();
        this.props.form.validateFields((errors, values) => {
            if (!!errors) {
                console.log('Errors in form!!!');
                console.log('--', errors, values);
                return;
            } else {
                console.log('params:', values);
                values._token = _token;
                $.ajax({
                    url: '/admin/login',
                    dataType: 'json',
                    type: 'POST',
                    data: values,
                    cache: false,
                    success: function (data) {
                        console.log('success:', data);
                        if (data.auth) {
                            message.success('登录成功');
                            window.location.href = data.intended;
                        } else {
                            message.error('用户名或密码错误');
                        }
                    }.bind(this),
                    error: function (xhr, status, err) {
                        message.error(err.toString());
                    }.bind(this)
                });
            }
            console.log('Submit!!!');
        });
    },

    checkPass(rule, value, callback) {
        const { validateFields } = this.props.form;
        if (value) {
            validateFields(['rePasswd']);
        }
        callback();
    },

    render() {

        const { getFieldProps, getFieldError, isFieldValidating } = this.props.form;
        const formData = this.state.formData;
        const status = this.state.status;

        return (
            <Row type="flex" justify="center" align="middle" style={{ marginTop:150 }}>
                <Col span="12">
                    <Form horizontal form={this.props.form} >
                        <FormItem
                            label="邮箱："
                            id="email"
                            labelCol={{span: 7}}
                            wrapperCol={{span: 10}}
                            hasFeedback
                            help={isFieldValidating('email') ? '校验中...' : (getFieldError('email') || []).join(', ')}
                            required>
                            <Input type="email" name="email" id="email" value={formData.email} placeholder="邮箱"
                                {...getFieldProps('email', {
                                    validate: [{
                                        rules: [
                                            { required: true, message: '请填写邮箱' },
                                        ],
                                        trigger: 'onBlur',
                                    }, {
                                        rules: [
                                            { type: 'email', message: '请输入正确的邮箱地址' },
                                        ],
                                        trigger: ['onBlur', 'onChange'],
                                    }]
                                })}
                            />
                        </FormItem>
                        <FormItem
                            label="密码："
                            id="password"
                            labelCol={{span: 7}}
                            wrapperCol={{span: 10}}
                            hasFeedback
                            required>
                            <Input type="password" name="password" autoComplete="off" id="password" value={formData.password}
                                {...getFieldProps('password', {
                                    rules: [
                                        { required: true, whitespace: true, min: 6, message: '请填写至少6位密码' },
                                    ]
                                })}
                                onContextMenu={noop} onPaste={noop} onCopy={noop} onCut={noop}
                            />
                        </FormItem>
                        <FormItem
                            wrapperCol={{span: 10, offset: 7}} >
                            <Button type="primary" onClick={this.handleSubmit}>登录</Button>
                            &nbsp;&nbsp;&nbsp;
                            <Button type="ghost" onClick={this.handleReset}>重置</Button>
                        </FormItem>
                    </Form>
                </Col>
            </Row>
        );
    }
});

Login = createForm()(Login);

ReactDOM.render(<Login />, document.getElementById('content'));

