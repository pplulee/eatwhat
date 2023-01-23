from requests import get
from pagermaid.listener import listener
from pagermaid.utils import obtain_message, alias_command


@listener(outgoing=True, command=alias_command("eatwhat"),
          description="roll一下今天吃什么\n省钱：1 正常：2 消费：3 狠狠消费：4 皇朝会：5", parameters="<价位(1-5)> <类型(eatin/takeaway/both)>")
async def eatwhat(context):
    await context.edit("正在获取中...")
    if len(context.parameter) < 2:
        await context.edit("格式有误，请重新输入！")
        return
    if int(context.parameter[0])< 1 or int(context.parameter[0]) > 5:
        await context.edit("价位范围为1-5！请重试")
        return
    if context.parameter[1] not in ["eatin", "takeaway", "both"]:
        await context.edit("类型只能是eatin/takeaway/both！请重试")
        return
    try:
        price = context.parameter[0]
        category = context.parameter[1]
        message = "?richness=" + price + "&category=" + category
    except ValueError:
        await context.edit("出错了呜呜呜 ~ 无效的参数。")
        return
    req = get("https://example.com/api.php" + message)   # 在这里填写你的API地址
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
        await context.edit(f"出错了！无法访问到API服务器，状态码：{req.status_code}")
