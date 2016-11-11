## webshop Symfony example
## from Packt.Modular.Programming.with.PHP.7 BOOK
====
### 创建步骤

#### 主体模块
 - `symfony new shop`
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

#### 目录模块
 - 创建目录模块
   - `php bin/console generate:bundle --namespace=Foggyline/CatalogBundle`
     - (该命令会在src目录创建Foggyline/CatalogBundle模块，里面含有Controller，DependencyInjection，Resources，Tests)
     - (routing.yml里会增加foggyline_catalog模块,修改prefix: / to prefix: /catalog/以便与主模块冲突)
 - 创建实体(entity)
   - 创建 Category entity
     - 命令 `php bin/console generate:doctrine:entity`
       - id: integer, auto-increment
       - title: string
       - url_key: string, unique
       - description: text
       - image: string
     - 更新数据库 `php bin/console doctrine:schema:update --force`
     - 生成 category CRUD (Controller,View)命令: `php bin/console generate:doctrine:crud`
       - routing.yml里会增加foggyline_catalog_category模块
       - 生成shop/app/Resources/views/category/ view文件
       - 复制shop/app/Resources/views/category/文件夹到shop/src/Foggyline/CatalogBundle/Resources/views/Default/目录
       - 修改shop/src/Foggyline/CatalogBundle/Controller/CategoryController.php里的各action的render（FoggylineCatalogBundle:default: string）
   - 创建 Product entity
     - 命令 `php bin/console generate:doctrine:entity`
       - id: integer, auto-increment
       - category: string
       - title: string
       - price: decimal
       - sku: string, unique
       - url_key: string, unique
       - description: text
       - qty: integer
       - image: string
       - onsale: boolean
   - 修改shop/src/Foggyline/CatalogBundle/Entity/Category.php加入类别对产品onetomany关系
   - 修改shop/src/Foggyline/CatalogBundle/Entity/Product.php加入产品对类别ManyToOne关系
   - 更新数据库 `php bin/console doctrine:schema:update --force`
   - 生成 product CRUD (Controller,View)命令:`php bin/console generate:doctrine:crud`
     - 生成shop/app/Resources/views/product/ view文件
     - 复制shop/app/Resources/views/product/文件夹到shop/src/Foggyline/CatalogBundle/Resources/views/Default/目录
     - 修改shop/src/Foggyline/CatalogBundle/Controller/ProductController.php里的各action的render（FoggylineCatalogBundle:default: string）
 - 修改Product,Category entity 中的image 注释（`* @Assert\File(mimeTypes={ "image/png", "image/jpeg" }, mimeTypesMessage="Please upload the PNG or JPEG image file.")`） 以便生成form时是上传控件
 - 添加上传服务shop/src/Foggyline/CatalogBundle/Resources/config/services.xml
 - 添加shop/src/Foggyline/CatalogBundle/Service/ImageUploader.php
 - 添加shop/src/Foggyline/CatalogBundle/Resources/config/parameters.yml 图片路径 foggyline_catalog_images_directory
 - 添加parameters.yml到shop/src/Foggyline/CatalogBundle/DependencyInjection/FoggylineCatalogExtension.php load方法里
 - 修改Product,Category 控制器new 和 edit action 上传图片和判断
 - 添加shop/src/Foggyline/CatalogBundle/Resources/config/services.xml category_menu and onsale service
 - 创建shop/src/Foggyline/CatalogBundle/Service/Menu/Category.php和shop/src/Foggyline/CatalogBundle/Service/Menu/OnSale.php service class
 - 创建shop/src/Foggyline/CatalogBundle/DependencyInjection/Compiler/OverrideServiceCompilerPass.php 重写核心service的category_menu和onsale
 - 将重写的service类OverrideServiceCompilerPass加入到src/Foggyline/CatalogBundle/FoggylineCatalogBundle.php 中
 - 修改src/Foggyline/CatalogBundle/Resources/views/Default/category|product/show.html.twig
 - 添加shop/src/AppBundle/Service/Menu/AddToCartUrl.php类 同时在shop/app/config/services.yml|config.yml加入add_to_cart_url
 - 添加src/Foggyline/CatalogBundle/Tests测试目录到phpunit.xml.dist
 - 添加测试文件shop/src/Foggyline/CatalogBundle/Tests/Menu/CategoryTest.php

#### 消费者模块
 - 消费者表结构
   - id: integer, auto-increment
   - email: string, unique
   - username: string, unique, needed for login system
   - password: string
   - first_name: string
   - last_name: string
   - company: string
   - phone_number: string
   - country: string
   - state: string
   - city: string
   - postcode: string
   - street: string
 - 创建消费者模块
   - `php bin/console generate:bundle --namespace=Foggyline/CustomerBundle`
     - (该命令会在src目录创建Foggyline/CustomerBundle模块，里面含有Controller，DependencyInjection，Resources，Tests)
     - (routing.yml里会增加foggyline_customer模块,修改prefix: / to prefix: /customer/以便与主模块冲突)
 - 创建Customer entity
   - `php bin/console generate:doctrine:entity`
   - `php bin/console doctrine:schema:update --force` 创建数据库表
   - `php bin/console generate:doctrine:crud` 创建增删改查（CRUD）
     - 生成shop/app/Resources/views/customer/ view文件
     - 复制shop/app/Resources/views/customer/文件夹到shop/src/Foggyline/CustomerBundle/Resources/views/Default/目录
     - 修改shop/src/Foggyline/CustomerBundle/Controller/CustomerController.php里的各action的render（FoggylineCustomerBundle:default: string）
   - 修改app/config/security.yml
     - 加入providers:foggyline_customer
     - 加入encoders:Foggyline\CustomerBundle\Entity\Customer
     - 加入firewall:foggyline_customer
     - 加入access_control路径和角色
   - 扩展Customer entity （实现Symfony\Component\Security\Core\User\UserInterface, \Serializable 两个接口）
 - 创建订单service（orders service）
   - 编辑src/Foggyline/CustomerBundle/Resources/config/services.xml加入foggyline_customer.customer_orders
   - 加入src/Foggyline/CustomerBundle/Service/CustomerOrders.php（虚拟数据，后期会重写该service）
 - 创建消费者菜单（customer menu service）
   - 编辑src/Foggyline/CustomerBundle/Resources/config/services.xml加入foggyline_customer.customer_menu
   - 创建src/Foggyline/CustomerBundle/Service/Menu/CustomerMenu.php
   - 重写customer_menu service src/Foggyline/CustomerBundle/DependencyInjection/Compiler/OverrideServiceCompilerPass.php 加入到 src/Foggyline/CustomerBundle/FoggylineCustomerBundle.php
 - 实现注册方法
   - src/Foggyline/CustomerBundle/Controller/CustomerController.php 创建registerAction
   - 创建src/Foggyline/CustomerBundle/Resources/views/Default/customer/register.html.twig
 - 实现登录方法
   - src/Foggyline/CustomerBundle/Controller/CustomerController.php 创建loginAction
   - 创建src/Foggyline/CustomerBundle/Resources/views/Default/customer/login.html.twig
   - 登录后创建accountAction和src/Foggyline/CustomerBundle/Resources/views/Default/customer/account.html.twig
     - 修改src/Foggyline/CustomerBundle/Form/CustomerType.php加入生成form时的一些验证
     - 修改src/Foggyline/CustomerBundle/Entity/Customer.php加入$plainPassword和方法
 - 实现退出和忘记密码方法
 - 单元测试
   - 加入测试路径到phpunit.xml.dist里
   - 加入测试文件src/Foggyline/CustomerBundle/Tests/Service/Menu/CustomerMenu.php和/src/Foggyline/CustomerBundle/Tests/Service/CustomerOrders.php

====

### Thanks
 - Packt.Modular.Programming.with.PHP.7 BOOK
 - Symfony
 - Foundation
 - PHP