# 今天吃什么捏
这是一个关于吃什么捏的小程序 \
网站包含一些私货（指footer） \
使用前请先将sql文件夹内的数据库文件导入并在config.php中配置数据库与管理员账号！
推荐菜部分请使用英文逗号（,）进行分割，例如：`菜品1,菜品2,菜品3`
## /ios 路径为iOS捷径反代路径，如使用请自行调整重定向或直接将/ios改为对应地址

## PagerMaid插件
本仓库中的eatwhat_modify.py和eatwhat_pyro.py文件是给[TeamPGM/PagerMaid-Modify](https://github.com/TeamPGM/PagerMaid-Modify)以及[TeamPGM/PagerMaid-Pyro](https://github.com/TeamPGM/PagerMaid-Pyro)Telegram机器人使用的插件
#### 文件需要修改后方能使用，请自行阅读文件并调整！不修改将无法使用您的数据库！
#### 使用方法：将文件内容修改为数据库对应内容后，将文件发送到任意聊天窗口回复发出的文件并输入指令`-apt install`/`,apt install`即可安装。安装完成后在任意窗口输入`-help eatwhat`/`,help eatwhat`即可获得使用方式
### 此插件为PagerMaid专用，无法用于其它任何机器人，但我们欢迎您进行二次创作制作对应版本的插件文件并提交Pull Request！