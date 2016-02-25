
import React from 'react';
import { Menu, Icon, message } from 'antd';
const SubMenu = Menu.SubMenu;

const pathMap = {
    '/admin/dashboard':         {'key':'0', 'openKey': 'sub0'},
    '/admin/auth/user':         {'key':'1', 'openKey': 'sub1'},
    '/admin/auth/role':         {'key':'2', 'openKey': 'sub1'},
    '/admin/auth/permission':   {'key':'3', 'openKey': 'sub1'}
};

const keyMap = {
    '0': '/admin/dashboard',
    '1': '/admin/auth/user',
    '2': '/admin/auth/role',
    '3': '/admin/auth/permission'
};

const Sider = React.createClass({
    getInitialState() {
        return {
            current: pathMap[window.location.pathname].key,
            openKeys: pathMap[window.location.pathname].key > 0 ? pathMap[window.location.pathname].openKey : ''
        };
    },
    handleClick(e) {
        console.log('click ', e);
        this.setState({
            current: e.key,
            openKeys: e.keyPath.slice(1)
        });
        window.location.href = keyMap[e.key];
    },
    onToggle(info) {
        this.setState({
            openKeys: info.open ? info.keyPath : info.keyPath.slice(1)
        });
    },
    render() {
        return <div>
            <Menu mode="inline"
                  onOpen={this.onToggle}
                  onClose={this.onToggle}
                  selectedKeys={[this.state.current]}
                  onClick={this.handleClick}
                  openKeys={this.state.openKeys}
                  theme="dark">
                <Menu.Item key="0">
                    {<span><Icon type="home" />仪表盘</span>}
                </Menu.Item>
                <SubMenu key="sub1" title={<span><Icon type="user" />用户管理</span>}>
                    <Menu.Item key="1">用户列表</Menu.Item>
                    <Menu.Item key="2">角色管理</Menu.Item>
                    <Menu.Item key="3">权限管理</Menu.Item>
                </SubMenu>
                <SubMenu key="sub2" title={<span><Icon type="laptop" />系统管理</span>}>
                    <Menu.Item key="5">基本配置</Menu.Item>
                    <Menu.Item key="6">选项6</Menu.Item>
                    <Menu.Item key="7">选项7</Menu.Item>
                    <Menu.Item key="8">选项8</Menu.Item>
                </SubMenu>
                <SubMenu key="sub3" title={<span><Icon type="notification" />新闻管理</span>}>
                    <Menu.Item key="9">新闻列表</Menu.Item>
                    <Menu.Item key="10">分类管理</Menu.Item>
                    <Menu.Item key="11">标签管理</Menu.Item>
                </SubMenu>
            </Menu>
        </div>;
    }
});

export default Sider;


