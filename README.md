## webshop Symfony example
====
### 创建步骤
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
## Thanks
 - Packt.Modular.Programming.with.PHP.7 BOOK
 - Symfony
 - Foundation
 - PHP