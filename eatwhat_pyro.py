from pagermaid import log
from pagermaid.listener import listener
from pagermaid.enums import Message
from requests import get

@listener(command="eatwhat",
          description="roll一下今天吃什么\n省钱：1 正常：2 消费：3 狠狠消费：4 皇朝会：5", parameters="[价位(1-5)] [类型(eatin/takeaway/both)]")
async def eatwhat(message: Message):
    msg = message.parameter
    await message.edit("正在获取中...")
    if len(msg) < 2:
        return await message.edit("格式有误，请重新输入！")
    elif not msg:
        return await message.edit("`出错了呜呜呜 ~ 无效的参数。`")
    elif int(msg[0])< 1 or int(msg[0]) > 5:
        return await message.edit("价位范围为1-5！请重试")
    elif msg[1] not in ["eatin", "takeaway", "both"]:
        return await message.edit("类型只能是eatin/takeaway/both！请重试")
    try:
        price = msg[0]
        category = msg[1]
        para = "?richness=" + price + "&category=" + category
    except Exception as e:
        return await message.edit(f"`出错了！报错信息：{e}`")
    req = get("https://example.com/api.php" + para)  # 在这里填写你的API地址
    if req.status_code == 200:
        try:
            data = req.text
            pointer = len(data) - 1
            while data[pointer] != ">" and pointer > 0:
                pointer -= 1
            data = data[pointer + 1:]
            data = "今天吃：" + data + "！"
            log(f"eatwhat: {data}")
            await message.edit(data)
        except Exception as e:
            return await message.edit(f"`出错了！报错信息：{e}`")
    else:
        return await message.edit(f"`出错了！无法访问到API服务器，状态码：{req.status_code}`")