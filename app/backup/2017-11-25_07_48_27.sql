-- -----------------------------
-- bool MySQL Data Transfer --
-- 日期：2017-11-25 19:48:27 --
-- -----------------------------

-- -----------------------------------
-- Table structure for `w_admin` --
-- -----------------------------------
DROP TABLE IF EXISTS `w_admin`;
CREATE TABLE "w_admin" (
  "id" mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  "username" varchar(16) NOT NULL COMMENT '用户名',
  "password" varchar(32) NOT NULL COMMENT '用户密码',
  "ip" varchar(32) NOT NULL DEFAULT '0.0.0.0' COMMENT 'ip',
  "phone" varchar(12) NOT NULL COMMENT '手机号',
  "email" varchar(40) NOT NULL COMMENT '邮箱',
  "state" tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '限制登录：0正常 1禁止',
  "last_time" int(11) unsigned NOT NULL COMMENT '最后登录次数',
  "add_time" int(11) unsigned NOT NULL,
  "login_num" mediumint(11) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  PRIMARY KEY ("id"),
  UNIQUE KEY "username" ("username") USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='用户表';


-- -----------------------------------
-- Table structure for `w_api` --
-- -----------------------------------
DROP TABLE IF EXISTS `w_api`;
CREATE TABLE "w_api" (
  "id" mediumint(9) unsigned NOT NULL AUTO_INCREMENT COMMENT '名称',
  "name" varchar(40) NOT NULL COMMENT '参数',
  "type" varchar(40) NOT NULL,
  "args" mediumtext NOT NULL,
  PRIMARY KEY ("id"),
  UNIQUE KEY "name" ("name")
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='api接口管理';


-- -----------------------------------
-- Table structure for `w_menu` --
-- -----------------------------------
DROP TABLE IF EXISTS `w_menu`;
CREATE TABLE "w_menu" (
  "id" mediumint(9) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  "pid" mediumint(9) unsigned NOT NULL DEFAULT '0' COMMENT '父级id，默认为0',
  "name" varchar(60) NOT NULL COMMENT '名字',
  "ico" varchar(30) NOT NULL COMMENT '图标',
  "state" tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态：0正常，1禁用',
  "sort" tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  "path" varchar(60) NOT NULL COMMENT 'path',
  "controller" varchar(50) DEFAULT NULL COMMENT '控制器',
  "action" varchar(50) DEFAULT 'index' COMMENT '方法',
  "pclass" varchar(30) NOT NULL COMMENT '父级 class',
  "level" tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '层级',
  "add_time" int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY ("id"),
  UNIQUE KEY "name" ("name")
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='后台菜单';


-- -----------------------------------
-- Table structure for `w_plugin` --
-- -----------------------------------
DROP TABLE IF EXISTS `w_plugin`;
CREATE TABLE "w_plugin" (
  "id" mediumint(9) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='插件';


-- -----------------------------------
-- Table structure for `w_product` --
-- -----------------------------------
DROP TABLE IF EXISTS `w_product`;
CREATE TABLE "w_product" (
  "id" mediumint(9) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  "pid" mediumint(9) unsigned NOT NULL COMMENT '分类id',
  "name" varchar(40) NOT NULL COMMENT '产品名称',
  "pcode" varchar(40) NOT NULL COMMENT '产品代码',
  "api" varchar(40) NOT NULL COMMENT 'api接口',
  "time_rule" mediumtext NOT NULL COMMENT '玩法时间间隔',
  "game_rule" mediumtext NOT NULL COMMENT '玩法规则',
  "rand" decimal(4,2) unsigned NOT NULL COMMENT '波动范围',
  "income" decimal(3,2) unsigned NOT NULL COMMENT '亏盈比例',
  "day_time" mediumtext COMMENT '周一 至 周五 开市时间',
  "week_time" mediumtext COMMENT '周末开市时间',
  "state" tinyint(4) unsigned NOT NULL COMMENT '状态 0：正常 1：禁止',
  "open" tinyint(1) unsigned DEFAULT '0' COMMENT '开市状态 0正常  1关闭',
  "desc" varchar(200) DEFAULT NULL COMMENT '描述',
  "add_time" int(11) unsigned NOT NULL COMMENT '创建时间',
  PRIMARY KEY ("id"),
  UNIQUE KEY "name" ("name")
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='产品表';


-- -----------------------------------
-- Table structure for `w_product_cate` --
-- -----------------------------------
DROP TABLE IF EXISTS `w_product_cate`;
CREATE TABLE "w_product_cate" (
  "id" mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  "pid" mediumint(9) unsigned NOT NULL DEFAULT '0' COMMENT '上级id，默认0为顶级',
  "name" varchar(60) NOT NULL COMMENT '分类名称',
  "state" tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态 0：正常 1：禁用',
  "desc" mediumtext NOT NULL COMMENT '备注',
  "order" tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  "add_time" int(11) unsigned NOT NULL COMMENT '创建时间',
  PRIMARY KEY ("id"),
  UNIQUE KEY "name" ("name")
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='产品分类';


-- -----------------------------------
-- Table structure for `w_role` --
-- -----------------------------------
DROP TABLE IF EXISTS `w_role`;
CREATE TABLE "w_role" (
  "id" mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  "name" varchar(100) NOT NULL COMMENT '角色名称',
  "node" mediumtext NOT NULL COMMENT '节点',
  "state" tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态： 0正常 1禁止',
  "desc" varchar(200) NOT NULL COMMENT '备注，不超过100字',
  "add_time" int(11) unsigned NOT NULL,
  PRIMARY KEY ("id"),
  UNIQUE KEY "name" ("name")
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='角色表';




-----------------------------------
-- insert of `w_admin` --
-- ---------------------------------
 INSERT INTO `w_admin` VALUES ('2','2','bool','bool','c506ff134babdd6e68ab3e6350e95305','c506ff134babdd6e68ab3e6350e95305','127.0.0.1','127.0.0.1','17052850083','17052850083','30024167@qq.com','30024167@qq.com','0','0','1511597828','1511597828','1511596252','1511596252','1','1');
 INSERT INTO `w_admin` VALUES ('1','1','admin','admin','bool','bool','0.0.0.0','0.0.0.0','17052850083','17052850083','17052850083','17052850083','0','0','0','0','0','0','0','0');


-----------------------------------
-- insert of `w_api` --
-- ---------------------------------
 INSERT INTO `w_api` VALUES ('1','1','新浪接口','新浪接口','sinaApi','sinaApi','{
    "欧元兑英镑": "fx_seurgbp",
    "欧元兑人民币": "fx_seurcny",
    "美元兑日元": "fx_susdjpy",
    "美元兑人民币": "fx_susdcny",
    "人民币兑美元": "fx_scnyusd",
    "人民币兑日元": "fx_scnyjpy",
    "人民币兑韩元": "fx_scnykrw",
    "人民币兑泰铢": "fx_scnythb",
    "人民币兑越南盾": "fx_scnyvnd",
    "人民币兑台湾元": "fx_scnytwd",
    "人民币澳门元": "fx_scnymop",
    "人民币兑港元": "fx_scnyhkd",
    "人民币兑新加坡元": "fx_scnysgd",
    "人民币兑俄罗斯卢布": "fx_scnyrub",
    "人民币兑澳大利亚元": "fx_scnyaud"
}','{
    "欧元兑英镑": "fx_seurgbp",
    "欧元兑人民币": "fx_seurcny",
    "美元兑日元": "fx_susdjpy",
    "美元兑人民币": "fx_susdcny",
    "人民币兑美元": "fx_scnyusd",
    "人民币兑日元": "fx_scnyjpy",
    "人民币兑韩元": "fx_scnykrw",
    "人民币兑泰铢": "fx_scnythb",
    "人民币兑越南盾": "fx_scnyvnd",
    "人民币兑台湾元": "fx_scnytwd",
    "人民币澳门元": "fx_scnymop",
    "人民币兑港元": "fx_scnyhkd",
    "人民币兑新加坡元": "fx_scnysgd",
    "人民币兑俄罗斯卢布": "fx_scnyrub",
    "人民币兑澳大利亚元": "fx_scnyaud"
}');
 INSERT INTO `w_api` VALUES ('2','2','OKCoin','OKCoin','OKCoinApi','OKCoinApi','{
    "比特币": "btc",
    "比特币1": "btc_usd",
    "莱特币": "ltc_usd",
    "以太坊": "eth_usd",
    "比特现金": "bcc_usd"
}','{
    "比特币": "btc",
    "比特币1": "btc_usd",
    "莱特币": "ltc_usd",
    "以太坊": "eth_usd",
    "比特现金": "bcc_usd"
}');
 INSERT INTO `w_api` VALUES ('3','3','口袋贵金属','口袋贵金属','SojexApi','SojexApi','{
    "美黄金": 1,
    "美白银": 2,
    "纸黄金": 3,
    "纸白银": 4,
    "黄金T+D": 5,
    "白银T+D": 6,
    "黄金9999": 7,
    "黄金9995": 8,
    "铂金9995": 9,
    "黄金100g": 10,
    "美指期货": 11,
    "现货黄金": 12,
    "现货白银": 13,
    "国际原油": 14,
    "NYMEX天然气": 15,
    "美元指数": 22,
    "美元人民币": 23,
    "欧元美元": 24,
    "澳元美元": 25,
    "英镑美元": 26,
    "西兰元美元": 27,
    "美元加元": 28,
    "美元瑞郎": 29,
    "美元港元": 30,
    "美元日元": 31,
    "美元马币": 32,
    "美元新加坡元": 33,
    "美元台币": 34,
    "上证指数": 35,
    "Ａ股指数": 36,
    "Ｂ股指数": 37,
    "综合指数": 38,
    "上证380": 39,
    "上证180": 40,
    "上证50": 41,
    "新综指": 42,
    "沪深300": 43,
    "深证成指": 44,
    "成份Ｂ指": 46,
    "深证100R": 47,
    "中小板指": 48,
    "创业板指": 49,
    "新 指 数": 50,
    "道琼斯指数": 54,
    "纳斯达克指数": 52,
    "标准普尔500": 53,
    "香港恒生指数": 55,
    "台湾台北指数": 56,
    "韩国KOSPI指数": 57,
    "PHILA金银指数": 58,
    "富时100指数": 59,
    "德国DAX指数": 60,
    "法国CAC40指数": 61,
    "俄罗斯MICEX10": 62,
    "荷兰AEX指数": 63,
    "天通银": 65,
    "天通钯金": 68,
    "天通铂金": 69,
    "美铂金": 70,
    "纸铂金": 71,
    "美钯金": 72,
    "纸钯金": 73,
    "现货铂金": 74,
    "现货钯金": 75,
    "中行本币金": 76,
    "中行外币金": 77,
    "建行黄金": 78,
    "建行白银": 79,
    "建行铂金": 80,
    "天通迷你白银": 81,
    "天通迷你钯金": 82,
    "天通迷你铂金": 83,
    "粤贵银9999": 84,
    "粤贵银9995": 85,
    "粤贵银100G": 86,
    "日经225指数": 87,
    "天通镍": 88,
    "天通镍100": 89,
    "LME镍": 90,
    "LME铅": 91,
    "LME锡": 92,
    "LME锌": 93,
    "LME铝": 94,
    "LME铜": 95,
    "CBOT黄豆": 96,
    "CBOT小麦": 97,
    "CBOT玉米": 98,
    "CBOT黄豆油": 99,
    "CBOT黄豆粉": 100,
    "日本橡胶": 101,
    "COMEX铜": 102,
    "COMEX白银": 105,
    "COMEX黄金": 106,
    "CME瘦猪肉": 107,
    "布伦特原油": 108,
    "现货钯金9995": 111,
    "现货铂金9995": 112,
    "中行本币银": 113,
    "中行外币银": 114,
    "现货白银30KG": 115,
    "美原油连续": 116,
    "美原油01": 117,
    "美原油02": 118,
    "美原油03": 119,
    "美原油04": 120,
    "美原油05": 121,
    "美原油06": 122,
    "美原油07": 123,
    "美原油08": 124,
    "美原油09": 125,
    "美原油10": 126,
    "美原油11": 127,
    "美原油12": 128,
    "布伦特原油01": 129,
    "布伦特原油02": 130,
    "布伦特原油03": 131,
    "布伦特原油04": 132,
    "布伦特原油05": 133,
    "布伦特原油06": 134,
    "布伦特原油07": 135,
    "布伦特原油11": 136,
    "布伦特原油12": 137,
    "现货铜": 138,
    "现货铜1T": 139,
    "现货铝": 140,
    "现货铝1T": 141,
    "汽油93#(吨)": 142,
    "汽油93#(升)": 143,
    "迷你黄金T+D": 144,
    "粤贵银": 145,
    "粤贵钯": 146,
    "粤贵铂": 147,
    "石化宝": 148,
    "工行北美油": 149,
    "人民币北美油": 151,
    "人民币国际油": 152,
    "微盘银": 153,
    "微盘铜": 154,
    "微盘油": 155,
    "0#柴油": 156,
    "93#汽油": 157,
    "前海油10": 158,
    "前海油20": 159,
    "前海油50": 160,
    "交割调整价": 161,
    "布伦特原油08": 162,
    "布伦特原油09": 163,
    "布伦特原油10": 164,
    "人民币黄金": 165,
    "人民币白银": 166,
    "美元账户黄金": 167,
    "美元账户白银": 168,
    "横琴铝": 169,
    "横琴铜": 170,
    "横琴镍": 171,
    "横琴铂": 172,
    "横琴钯": 173,
    "横琴银": 174,
    "粤东油B": 176,
    "粤东油": 177,
    "乙二醇(罐)": 178,
    "乙二醇(吨)": 179
}','{
    "美黄金": 1,
    "美白银": 2,
    "纸黄金": 3,
    "纸白银": 4,
    "黄金T+D": 5,
    "白银T+D": 6,
    "黄金9999": 7,
    "黄金9995": 8,
    "铂金9995": 9,
    "黄金100g": 10,
    "美指期货": 11,
    "现货黄金": 12,
    "现货白银": 13,
    "国际原油": 14,
    "NYMEX天然气": 15,
    "美元指数": 22,
    "美元人民币": 23,
    "欧元美元": 24,
    "澳元美元": 25,
    "英镑美元": 26,
    "西兰元美元": 27,
    "美元加元": 28,
    "美元瑞郎": 29,
    "美元港元": 30,
    "美元日元": 31,
    "美元马币": 32,
    "美元新加坡元": 33,
    "美元台币": 34,
    "上证指数": 35,
    "Ａ股指数": 36,
    "Ｂ股指数": 37,
    "综合指数": 38,
    "上证380": 39,
    "上证180": 40,
    "上证50": 41,
    "新综指": 42,
    "沪深300": 43,
    "深证成指": 44,
    "成份Ｂ指": 46,
    "深证100R": 47,
    "中小板指": 48,
    "创业板指": 49,
    "新 指 数": 50,
    "道琼斯指数": 54,
    "纳斯达克指数": 52,
    "标准普尔500": 53,
    "香港恒生指数": 55,
    "台湾台北指数": 56,
    "韩国KOSPI指数": 57,
    "PHILA金银指数": 58,
    "富时100指数": 59,
    "德国DAX指数": 60,
    "法国CAC40指数": 61,
    "俄罗斯MICEX10": 62,
    "荷兰AEX指数": 63,
    "天通银": 65,
    "天通钯金": 68,
    "天通铂金": 69,
    "美铂金": 70,
    "纸铂金": 71,
    "美钯金": 72,
    "纸钯金": 73,
    "现货铂金": 74,
    "现货钯金": 75,
    "中行本币金": 76,
    "中行外币金": 77,
    "建行黄金": 78,
    "建行白银": 79,
    "建行铂金": 80,
    "天通迷你白银": 81,
    "天通迷你钯金": 82,
    "天通迷你铂金": 83,
    "粤贵银9999": 84,
    "粤贵银9995": 85,
    "粤贵银100G": 86,
    "日经225指数": 87,
    "天通镍": 88,
    "天通镍100": 89,
    "LME镍": 90,
    "LME铅": 91,
    "LME锡": 92,
    "LME锌": 93,
    "LME铝": 94,
    "LME铜": 95,
    "CBOT黄豆": 96,
    "CBOT小麦": 97,
    "CBOT玉米": 98,
    "CBOT黄豆油": 99,
    "CBOT黄豆粉": 100,
    "日本橡胶": 101,
    "COMEX铜": 102,
    "COMEX白银": 105,
    "COMEX黄金": 106,
    "CME瘦猪肉": 107,
    "布伦特原油": 108,
    "现货钯金9995": 111,
    "现货铂金9995": 112,
    "中行本币银": 113,
    "中行外币银": 114,
    "现货白银30KG": 115,
    "美原油连续": 116,
    "美原油01": 117,
    "美原油02": 118,
    "美原油03": 119,
    "美原油04": 120,
    "美原油05": 121,
    "美原油06": 122,
    "美原油07": 123,
    "美原油08": 124,
    "美原油09": 125,
    "美原油10": 126,
    "美原油11": 127,
    "美原油12": 128,
    "布伦特原油01": 129,
    "布伦特原油02": 130,
    "布伦特原油03": 131,
    "布伦特原油04": 132,
    "布伦特原油05": 133,
    "布伦特原油06": 134,
    "布伦特原油07": 135,
    "布伦特原油11": 136,
    "布伦特原油12": 137,
    "现货铜": 138,
    "现货铜1T": 139,
    "现货铝": 140,
    "现货铝1T": 141,
    "汽油93#(吨)": 142,
    "汽油93#(升)": 143,
    "迷你黄金T+D": 144,
    "粤贵银": 145,
    "粤贵钯": 146,
    "粤贵铂": 147,
    "石化宝": 148,
    "工行北美油": 149,
    "人民币北美油": 151,
    "人民币国际油": 152,
    "微盘银": 153,
    "微盘铜": 154,
    "微盘油": 155,
    "0#柴油": 156,
    "93#汽油": 157,
    "前海油10": 158,
    "前海油20": 159,
    "前海油50": 160,
    "交割调整价": 161,
    "布伦特原油08": 162,
    "布伦特原油09": 163,
    "布伦特原油10": 164,
    "人民币黄金": 165,
    "人民币白银": 166,
    "美元账户黄金": 167,
    "美元账户白银": 168,
    "横琴铝": 169,
    "横琴铜": 170,
    "横琴镍": 171,
    "横琴铂": 172,
    "横琴钯": 173,
    "横琴银": 174,
    "粤东油B": 176,
    "粤东油": 177,
    "乙二醇(罐)": 178,
    "乙二醇(吨)": 179
}');


-----------------------------------
-- insert of `w_menu` --
-- ---------------------------------
 INSERT INTO `w_menu` VALUES ('1','1','0','0','首页','首页','fa-home','fa-home','0','0','0','0','0-1','0-1','index','index','index','index','index','index','0','0','1505894656','1505894656');
 INSERT INTO `w_menu` VALUES ('2','2','0','0','产品管理','产品管理','fa-file','fa-file','0','0','0','0','0-2','0-2','','','','','product','product','0','0','1505894656','1505894656');
 INSERT INTO `w_menu` VALUES ('3','3','2','2','产品列表','产品列表','','','0','0','0','0','0-2-3','0-2-3','product','product','index','index','product','product','1','1','1505894656','1505894656');
 INSERT INTO `w_menu` VALUES ('4','4','2','2','产品分类','产品分类','','','0','0','0','0','0-2-4','0-2-4','product','product','cate','cate','product','product','1','1','1505894656','1505894656');
 INSERT INTO `w_menu` VALUES ('5','5','0','0','管理员管理','管理员管理','fa-user','fa-user','0','0','0','0','0-5','0-5','','','','','admin','admin','0','0','1505894656','1505894656');
 INSERT INTO `w_menu` VALUES ('6','6','5','5','管理员列表','管理员列表','','','0','0','0','0','0-5-6','0-5-6','admin','admin','index','index','admin','admin','1','1','1505894656','1505894656');
 INSERT INTO `w_menu` VALUES ('7','7','5','5','角色管理','角色管理','','','0','0','0','0','0-5-7','0-5-7','role','role','index','index','admin','admin','1','1','1505894656','1505894656');
 INSERT INTO `w_menu` VALUES ('8','8','0','0','数据库管理','数据库管理','fa-database','fa-database','0','0','0','0','0-8','0-8','','','','','database','database','0','0','1505894656','1505894656');
 INSERT INTO `w_menu` VALUES ('9','9','8','8','数据库备份','数据库备份','','','0','0','0','0','0-8-9','0-8-9','database','database','index','index','database','database','1','1','1505894656','1505894656');
 INSERT INTO `w_menu` VALUES ('10','10','8','8','数据库恢复','数据库恢复','','','0','0','0','0','0-8-10','0-8-10','database','database','index','index','database','database','1','1','1505894656','1505894656');
 INSERT INTO `w_menu` VALUES ('11','11','0','0','日志管理','日志管理','fa-file-text','fa-file-text','0','0','0','0','0-11','0-11','','','','','log','log','0','0','1505894656','1505894656');
 INSERT INTO `w_menu` VALUES ('12','12','11','11','操作日志','操作日志','','','0','0','0','0','0-11-12','0-11-12','log','log','index','index','log','log','1','1','1505894656','1505894656');
 INSERT INTO `w_menu` VALUES ('13','13','11','11','错误日志','错误日志','','','0','0','0','0','0-11-12','0-11-12','log','log','index','index','log','log','1','1','1505894656','1505894656');
 INSERT INTO `w_menu` VALUES ('14','14','0','0','应用商店','应用商店','fa-shopping-bag','fa-shopping-bag','0','0','0','0','0-14','0-14','store','store','index','index','store','store','0','0','1505894656','1505894656');
 INSERT INTO `w_menu` VALUES ('16','16','0','0','基本设置','基本设置','fa-cogs','fa-cogs','0','0','0','0','0-16','0-16','conf','conf','index','index','conf','conf','0','0','1505894656','1505894656');
 INSERT INTO `w_menu` VALUES ('15','15','0','0','界面设计','界面设计','fa-dashboard','fa-dashboard','0','0','0','0','0-15','0-15','ui','ui','index','index','ui','ui','0','0','1505894656','1505894656');
 INSERT INTO `w_menu` VALUES ('17','17','0','0','客户管理','客户管理','fa-user','fa-user','0','0','0','0','0-17','0-17','user','user','index','index','user','user','0','0','1505894656','1505894656');
 INSERT INTO `w_menu` VALUES ('18','18','0','0','订单管理','订单管理','fa-file-text-o','fa-file-text-o','0','0','0','0','0-18','0-18','order','order','index','index','order','order','0','0','1505894656','1505894656');
 INSERT INTO `w_menu` VALUES ('19','19','0','0','代理商管理','代理商管理','fa-user','fa-user','0','0','0','0','0-19','0-19','agent','agent','index','index','agent','agent','0','0','1505894656','1505894656');
 INSERT INTO `w_menu` VALUES ('20','20','0','0','开发者选项','开发者选项','fa-user-secret','fa-user-secret','0','0','0','0','0-20','0-20','developer','developer','index','index','developer','developer','0','0','1505894656','1505894656');
 INSERT INTO `w_menu` VALUES ('21','21','0','0','快速充值','快速充值','fa-user','fa-user','0','0','0','0','0-21','0-21','money','money','index','index','money','money','0','0','1505894656','1505894656');
 INSERT INTO `w_menu` VALUES ('22','22','2','2','风控管理','风控管理','','','0','0','0','0','0-2-22','0-2-22','product','product','risk','risk','product','product','1','1','1505894656','1505894656');


-----------------------------------
-- insert of `w_product` --
-- ---------------------------------
 INSERT INTO `w_product` VALUES ('1','1','1','1','人民币兑美元','人民币兑美元','fx_scnyjpy','fx_scnyjpy','sinaApi','sinaApi','1,3,5,10','1,3,5,10','0','0','0.30','0.30','5.00','5.00','0:00-23:59','0:00-23:59','0:00-23:59','0:00-23:59','0','0','0','0','人民币兑美元','人民币兑美元','1507120963','1507120963');
 INSERT INTO `w_product` VALUES ('2','2','1','1','人民币兑台币','人民币兑台币','fx_scnytwd','fx_scnytwd','sinaApi','sinaApi','1,3,5','1,3,5','2','2','0.00','0.00','9.99','9.99','0:00-23:59','0:00-23:59','0:00-23:59','0:00-23:59','0','0','0','0','','','1507121102','1507121102');
 INSERT INTO `w_product` VALUES ('3','3','1','1','人民币兑港元','人民币兑港元','fx_scnyhkd','fx_scnyhkd','sinaApi','sinaApi','3,5,10','3,5,10','0','0','0.50','0.50','5.00','5.00','0:00-23:59','0:00-23:59','','','0','0','0','0','人民币兑港元','人民币兑港元','1507528048','1507528048');
 INSERT INTO `w_product` VALUES ('4','4','1','1','欧元兑英镑','欧元兑英镑','fx_seurgbp','fx_seurgbp','sinaApi','sinaApi','1,3,5','1,3,5','2','2','0.10','0.10','5.00','5.00','0:00-23:59','0:00-23:59','','','0','0','0','0','欧元兑英镑','欧元兑英镑','1508395598','1508395598');
 INSERT INTO `w_product` VALUES ('5','5','1','1','人民币兑韩元','人民币兑韩元','fx_scnykrw','fx_scnykrw','sinaApi','sinaApi','1,3,5','1,3,5','1','1','0.40','0.40','5.00','5.00','0:00-23:59','0:00-23:59','','','0','0','0','0','人民币兑韩元','人民币兑韩元','1508395655','1508395655');
 INSERT INTO `w_product` VALUES ('6','6','1','1','人民币越南盾','人民币越南盾','fx_scnyvnd','fx_scnyvnd','sinaApi','sinaApi','1,3,5','1,3,5','0','0','0.01','0.01','5.00','5.00','0:00-23:59','0:00-23:59','0:00-23:59','0:00-23:59','0','0','0','0','0:00-23:59','0:00-23:59','1508864293','1508864293');
 INSERT INTO `w_product` VALUES ('7','7','1','1','欧元人民币','欧元人民币','fx_seurcny','fx_seurcny','sinaApi','sinaApi','1,3,5','1,3,5','0','0','0.01','0.01','5.00','5.00','0:00-23:59','0:00-23:59','0:00-23:59','0:00-23:59','0','0','0','0','欧元人民币','欧元人民币','1508864382','1508864382');
 INSERT INTO `w_product` VALUES ('8','8','1','1','比特币','比特币','btc','btc','OKCoinApi','OKCoinApi','1,3,5','1,3,5','0','0','0.50','0.50','5.00','5.00','0:00-23:59','0:00-23:59','','','0','0','0','0','比特币','比特币','1511523710','1511523710');
 INSERT INTO `w_product` VALUES ('9','9','2','2','美黄金','美黄金','1','1','SojexApi','SojexApi','1,3,5','1,3,5','0','0','0.50','0.50','5.00','5.00','0:00-23:59','0:00-23:59','','','0','0','0','0','美黄金','美黄金','1511523804','1511523804');


-----------------------------------
-- insert of `w_product_cate` --
-- ---------------------------------
 INSERT INTO `w_product_cate` VALUES ('1','1','0','0','货币','货币','0','0','货币','货币','0','0','1508395519','1508395519');
 INSERT INTO `w_product_cate` VALUES ('2','2','0','0','金属','金属','0','0','金属','金属','0','0','1508395529','1508395529');
 INSERT INTO `w_product_cate` VALUES ('3','3','0','0','矿石','矿石','0','0','矿石','矿石','0','0','1508395549','1508395549');
 INSERT INTO `w_product_cate` VALUES ('4','4','0','0','股票','股票','0','0','股票','股票','0','0','1511525915','1511525915');


-----------------------------------
-- insert of `w_role` --
-- ---------------------------------
 INSERT INTO `w_role` VALUES ('1','1','普通管理员','普通管理员','1,2,3,4,5,6','1,2,3,4,5,6','0','0','1111','1111','1505894656','1505894656');
 INSERT INTO `w_role` VALUES ('2','2','开发人员','开发人员','','','0','0','开发人员','开发人员','1505962838','1505962838');
