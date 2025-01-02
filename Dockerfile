FROM ubuntu:14.04

# 安装必要软件
RUN apt-get update && apt-get install -y \
    openssh-server \
    php5 \
    php5-cli \
    && rm -rf /var/lib/apt/lists/*

# 配置SSH
RUN mkdir /var/run/sshd
RUN echo 'root:password' | chpasswd
RUN sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config

# 暴露端口
EXPOSE 22 80

# 启动服务
CMD ["/usr/sbin/sshd", "-D"]
