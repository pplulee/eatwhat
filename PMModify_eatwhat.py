import json
from json import JSONDecodeError
from requests import get
from pagermaid import version
from pagermaid.listener import listener
from pagermaid.utils import obtain_message, alias_command


@listener(outgoing=True, command=alias_command("eatwhat"),
          description="roll一下今天吃什么\n价位：1-xxx 2-xxx 3-xxx 4-xxx 5-xxx", # 在此处修改为你的数据库richness对应内容
          parameters="<价位(1-5)> <类型(eatin/takeaway/both)>") # 酌情修改提示信息
async def eatwhat(context):
    await context.edit("正在获取中...")
    if int(context.parameter[0])< 1 or int(context.parameter[0]) > 5:   # 在此处将1和5修改为你的数据库richness对应范围
        await context.edit("价位范围为1-5！请重试")              # 酌情修改提示信息
        return
    if context.parameter[1] not in ["eatin", "takeaway", "both"]:          # 在此处修改为你的数据库category对应内容
        await context.edit("类型只能是eatin/takeaway/both！请重试")          # 在此处修改为你的数据库category对应内容
        return
    try:
        price = context.parameter[0]
        category = context.parameter[1]
        message = "?richness=" + price + "&category=" + category
    except ValueError:
        await context.edit("出错了呜呜呜 ~ 无效的参数。")
        return
    req = get("https://example.com/api.php" + message)             # 在此处将https://example.com/api.php替换为你的部署地址+/api.php
    if req.status_code == 200:
        try:
            data = req.text
            pointer = len(data) - 1
            while data[pointer] != ">" and pointer > 0:
                pointer -= 1
            data = data[pointer + 1:]
        except BaseException as e:
            await context.edit("出错了呜呜呜 ~ 报错信息：" + str(e))
            return
        data = "今天吃：" + data + "！"
        await context.edit(data)
    else:
        await context.edit("出错了呜呜呜 ~ 无法访问到 API 服务器 。")
