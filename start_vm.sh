#!/bin/bash

# 构建Docker镜像
docker build -t php5-vm .

# 启动容器
docker run -d \
    -p 2222:22 \
    -p 8000:80 \
    --name php5-vm \
    php5-vm

echo "VPS已启动，请按照以下步骤操作："
echo "1. 上传文件："
echo "   scp -P 2222 -r ./* root@localhost:/var/www/html"
echo "2. 登录VPS："
echo "   ssh -p 2222 root@localhost"
echo "   密码：password"
echo "3. 在VPS中启动PHP服务器："
echo "   cd /var/www/html && php -S 0.0.0.0:80"
echo "4. 在浏览器中访问："
echo "   http://localhost:8000"
