# 2000年代风格Todo List

这是一个模拟2000年代技术栈的Todo List应用，使用PHP、原生JavaScript和HTML构建。

## 运行方式

### 传统方式
1. 确保已安装PHP
2. 在项目目录运行：
   ```bash
   php -S localhost:8000
   ```
3. 在浏览器中访问 http://localhost:8000

### 模拟VPS方式
1. 确保已安装Docker
2. 运行启动脚本：
   ```bash
   chmod +x start_vm.sh
   ./start_vm.sh
   ```
3. 按照屏幕提示操作，包括：
   - 使用SCP上传文件
   - 通过SSH登录VPS
   - 在VPS中启动PHP服务器
4. 在浏览器中访问 http://localhost:8000

## 技术栈及年代
- PHP 5 (2004年发布)
- 原生JavaScript (1995年发布)
- HTML 4.01 (1999年发布)
- CSS 2 (1998年发布)
- JSON (2001年发布)
- AJAX (1999年提出，2005年流行)
- SSH (1995年发布)
- Ubuntu 14.04 (2014年发布，用于模拟VPS环境)

## 项目结构
- index.php - 主入口文件
- style.css - 样式文件
- todos.js - JavaScript交互逻辑
- update_todo.php - AJAX请求处理
- todos.json - 数据存储文件
- Dockerfile - VPS环境定义
- start_vm.sh - VPS启动脚本
