## webshop Symfony example
====
### 创建步骤
 - symfony new shop
 - 复制Foundation框架到web目录下
 - 修改base.html.twig(把foundation的css，js引入)
 - 修改config.yml文件：
   - 加入twig的globals变量：建立应用菜单（menu）
 - 修改services.yml文件：
   - 对应twig的globals变量加入菜单服务
 - 在项目目录/shop/src/AppBundle/Service/Menu/下对应建立服务类（class）
 - 再次修改base.html.twig文件，将menu的代码（div）加入进去
 - 建立各个子模版twig文件到shop/src/AppBundle/Resources/views/default/
 - 修改shop/src/AppBundle/Controller/DefaultController.php加入各菜单Action和route
 - app安全修改shop/app/config/security.yml
   - 加入用户认证：users
   - 加入防火墙：firewalls 规则名称可以随便取
   - 加入生成密码算法：encoders
   - 加入访问控制：access_control
 - 单元测试修改shop/phpunit.xml.dist中testsuite路径
 - 编写测试类shop/src/AppBundle/Tests/Controller/DefaultControllerTest.php


Thanks
 - Packt.Modular.Programming.with.PHP.7 BOOK
 - Symfony
 - Foundation
 - PHP