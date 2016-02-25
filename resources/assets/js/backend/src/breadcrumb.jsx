
import React from 'react';
import { Breadcrumb } from 'antd';

const breadcrumb = React.createClass({
    getInitialState() {
        return {
            data: []
        };
    },
    componentWillMount: function () {
        this.setState({data: this.props.data});
    },
    render() {
        return <div>
            <Breadcrumb>
                <Breadcrumb.Item href="/admin/dashboard">首页</Breadcrumb.Item>
                <Breadcrumb.Item href="">用户管理</Breadcrumb.Item>
                <Breadcrumb.Item href="">用户列表</Breadcrumb.Item>
            </Breadcrumb>
        </div>;
    }
});

export default breadcrumb;


