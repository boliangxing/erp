<?php $this->load->view('header');?>

<header class="Hui-header cl"> <a class="Hui-logo l" title="H-ui.admin v2.3" href="/">泽谷库存管理</a> <a class="Hui-logo-m l" href="/" title="H-ui.admin">H-ui</a> <span class="Hui-subtitle l">V1---CI</span>
    <nav class="mainnav cl" id="Hui-nav">
        <!-- <ul>
            <li class="dropDown dropDown_click"><a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>
                <ul class="dropDown-menu radius box-shadow">
                    <li><a href="javascript:;" onclick="article_add('添加资讯','article-add.html')"><i class="Hui-iconfont">&#xe616;</i> 资讯</a></li>
                    <li><a href="javascript:;" onclick="picture_add('添加资讯','picture-add.html')"><i class="Hui-iconfont">&#xe613;</i> 图片</a></li>
                    <li><a href="javascript:;" onclick="product_add('添加资讯','product-add.html')"><i class="Hui-iconfont">&#xe620;</i> 产品</a></li>
                    <li><a href="javascript:;" onclick="member_add('添加用户','member-add.html','','510')"><i class="Hui-iconfont">&#xe60d;</i> 用户</a></li>
                </ul>
            </li>
        </ul> -->
    </nav>
    <ul class="Hui-userbar">
<input type="hidden" value="<?php $arr=$_SESSION['user']; foreach($arr as $ar){ echo $ar['qx']; } ?>"/>
        <li><?php $arr=$_SESSION['user']; foreach($arr as $ar){ if($ar['qx']==1){ echo "您是尊贵的超级管理员，拥有所有的权限";}elseif($ar['qx']==2){echo "您是的普通管理员，拥有部分的权限";}else{echo "您是的游客，暂无权限"; } } ?> </li>
        <li class="dropDown dropDown_hover"><a href="#" class="dropDown_A"><?php $arr=$_SESSION['user']; foreach($arr as $ar){ echo $ar['num']; }?> </a>


        </li>  <li><a href="login/out">退出</a></li>
        <!-- <li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li> -->
        <li id="Hui-skin" class="dropDown right dropDown_hover"><a href="javascript:;" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
            <ul class="dropDown-menu radius box-shadow">
                <li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
                <li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
                <li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
                <li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
                <li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
                <li><a href="javascript:;" data-val="orange" title="绿色">橙色</a></li>
            </ul>
        </li>
    </ul>
    <a aria-hidden="false" class="Hui-nav-toggle" href="#"></a> </header>
<aside class="Hui-aside">
    <input runat="server" id="divScrollValue" type="hidden" value="" />
    <div class="menu_dropdown bk_2">
      <?php $arr=$_SESSION['user']; foreach($arr as $ar){  ?>
        <?php if($ar['qx']==1) {?>



          <!--<dl id="menu-article">
                    <dt><i class="Hui-iconfont">&#xe616;</i> 用户管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                    <dd>
                        <ul>
                            <li><a _href="<?php echo site_url('user') ?>" href="javascript:void(0)">用户列表</a></li>
                      <li><a _href="<?php echo site_url('feedback') ?>" href="javascript:void(0)">用户反馈</a></li>
                        </ul>
                    </dd>
                </dl>
                <dl id="menu-picture">
                    <dt><i class="Hui-iconfont">&#xe613;</i> 设备管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                    <dd>
                        <ul>
                            <li><a _href="<?php echo site_url('facility') ?>" href="javascript:void(0)">设备列表</a></li>
                <li><a _href="<?php echo site_url('Baojing') ?>" href="javascript:void(0)">报警记录</a></li>
                        </ul>
                    </dd>
                </dl>
                <dl id="menu-picture">
                    <dt><i class="Hui-iconfont">&#xe613;</i> 产品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>

            <dd>
                        <ul>
                            <li><a _href="<?php echo site_url('product/proadd') ?>" href="javascript:void(0)">新增产品</a></li>
                            <li><a _href="<?php echo site_url('product/prolist') ?>" href="javascript:void(0)">产品列表</a></li>
                        </ul>
                    </dd>
                </dl>
          <dl id="menu-product">
              <dt><i class="Hui-iconfont">&#xe620;</i> 微信管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
              <dd>
                  <ul>
                      <li><a _href="<?php echo site_url('Weixin/setting') ?>" href="javascript:void(0)">微信接入</a></li>
                      <li><a _href="<?php echo site_url('Weixin/menu') ?>" href="javascript:void(0)">自定义菜单</a></li>
                      <li><a _href="<?php echo site_url('Weixin/reply') ?>" href="javascript:void(0)">关注回复</a></li>
                  </ul>
              </dd>
          </dl>
          <dl id="menu-product">
              <dt><i class="Hui-iconfont">&#xe620;</i> APP管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
              <dd>
                  <ul>
                      <li><a _href="<?php echo site_url('userlog/index') ?>" href="javascript:void(0)">操作日志</a></li>
                      <li><a _href="<?php echo site_url('userlog/update') ?>" href="javascript:void(0)">APP版本</a></li>
                  </ul>
              </dd>
          </dl>
      <dl id="menu-product">
    					<dt><i class="Hui-iconfont">&#xe620;</i> 场景管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
    					<dd>
    						<ul>
    							<li><a _href="<?php echo site_url('scene') ?>" data-title="分类管理" href="javascript:void(0)">分类管理</a></li>
     						</ul>
    					</dd>
    				</dl>
    				<dl id="menu-product">
    					<dt><i class="Hui-iconfont">&#xe620;</i> 代理商管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
    					<dd>
    						<ul>

    							<li><a _href="<?php echo site_url('agency') ?>" data-title="管理列表" href="javascript:void(0)">管理列表</a></li>
    						</ul>
    					</dd>
    				</dl>
    				<dl id="menu-product">
    					<dt><i class="Hui-iconfont">&#xe620;</i> 后台权限管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
    					<dd>
    						<ul>

    							<li><a _href="<?php echo site_url('permission') ?>" data-title="权限列表" href="javascript:void(0)">后台用户权限列表</a></li>
    						</ul>
    					</dd>
    				</dl>-->

            <dl id="menu-article">
                      <dt><i class="Hui-iconfont">&#xe616;</i> 生产管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                      <dd>
                          <ul>
                              <li><a _href="<?php echo site_url('product/proadd') ?>?step=1" data-title="添加生产计划" >添加生产计划</a></li>
                        <li><a _href="<?php echo site_url('product/index') ?>" data-title="生产计划列表" >生产计划列表</a></li>
                        <li><a _href="<?php echo site_url('faliao/index') ?>" data-title="发料管理">发料管理</a></li>
                          </ul>
                      </dd>
                  </dl>
         <dl id="menu-article">
               <dt><i class="Hui-iconfont">&#xe616;</i> 销售管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                 <dd>
                         <ul>
                         <li><a _href="<?php echo site_url('xiaoshou/index') ?>" data-title="销售列表" >销售列表</a></li>

                       </ul>
                   </dd>
                   </dl>
             <dl id="menu-article">
                   <dt><i class="Hui-iconfont">&#xe616;</i> 手机卡管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                   <dd>
                           <ul>
                         <li><a _href="<?php echo site_url('Sim') ?>" >手机卡列表</a></li>


                   </ul>
                 </dd>
                             </dl>
     <dl id="menu-article">
                 <dt><i class="Hui-iconfont">&#xe616;</i> 供应商管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                   <dd>
                               <ul>

            <li><a _href="<?php echo site_url('agency') ?>" data-title="供应商列表" >供应商列表</a></li>
                     </ul>
               </dd>
               </dl>
               <dl id="menu-article">
                           <dt><i class="Hui-iconfont">&#xe616;</i> 客户管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                             <dd>
                                         <ul>
                      <li><a _href="<?php echo site_url('customer/leibie') ?>" data-title="客户类别" >客户类别</a></li>
                                   <li><a _href="<?php echo site_url('customer') ?>" data-title="客户列表" >客户列表</a></li>
                               </ul>
                         </dd>
                         </dl>
                  <!--       <dl id="menu-article">
               <dt><i class="Hui-iconfont">&#xe616;</i> 成品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                   <dd>
                               <ul>
              <li><a _href="#" >成品类别</a></li>
                     <li><a _href="#" >成品列表</a></li>
                       </ul>
                   </dd>
                          </dl>
                          <dl id="menu-article">
                <dt><i class="Hui-iconfont">&#xe616;</i> 半成品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                    <dd>
                                <ul>
               <li><a _href="#" >添加半成品</a></li>
                  <li><a _href="#" >半成品类别列表</a></li>
                     <li><a _href="#" >添加半成品类别</a></li>
                      <li><a _href="#" >半成品列表</a></li>
                        </ul>
                    </dd>
                  </dl>-->
                           <dl id="menu-article">
                 <dt><i class="Hui-iconfont">&#xe616;</i> 库存管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                     <dd>
                                 <ul>
                   <li><a _href="<?php echo site_url('Yuanjian/index') ?>" data-title="电子元件" >电子元件</a></li>

   <li><a _href="<?php echo site_url('Bangong/index') ?>">办公用品</a></li>
                      <li><a _href="<?php echo site_url('Cidian/index') ?>" >工具词典</a></li>

                         </ul>
                     </dd>
                            </dl>
                            <dl id="menu-article">
                  <dt><i class="Hui-iconfont">&#xe616;</i> 元件添加<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                      <dd>
                                  <ul>
                  <li><a _href="<?php echo site_url('Dianzu_fa/dzfa_add') ?>" >添加元件</a></li>

                          </ul>
                      </dd>
                             </dl>
                            <dl id="menu-article">
                  <dt><i class="Hui-iconfont">&#xe616;</i> 采购管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                      <dd>
                                  <ul>
                 <li><a _href="<?php echo site_url('product/caigou') ?>" data-title="生产采购清单" >生产采购清单</a></li>
                        <li><a _href="<?php echo site_url('caigou/rc') ?>" data-title="日常采购清单"  >日常采购清单</a></li>
                          </ul>
                      </dd>
                             </dl>
                       </aside>
                       <div class="dislpayArrow"><a class="pngfix" onClick="displaynavbar(this)"></a></div>
                       <section class="Hui-article-box">
                           <div id="Hui-tabNav" class="Hui-tabNav">
                               <div class="Hui-tabNav-wp">
                                   <ul id="min_title_list" class="acrossTab cl">
                                       <li class="active"><span title="我的桌面" data-href="welcome.html">我的桌面</span><em></em></li>
                                   </ul>
                               </div>
                               <div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
                           </div>
                           <div id="iframe_box" class="Hui-article">
                               <div class="show_iframe">
                                   <div style="display:none" class="loading"></div>
                                   <iframe scrolling="yes" frameborder="0" src="<?php echo site_url('main/welcome') ?>"></iframe>
                               </div>
                           </div>
                       </section>
        <?php    }?>
            <?php if($ar['qx']==2) {?>



                      <!--  <dl id="menu-product">
                            <dt><i class="Hui-iconfont">&#xe620;</i> 微信管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                            <dd>
                                <ul>
                                    <li><a _href="<?php echo site_url('Weixin/setting') ?>" href="javascript:void(0)">微信接入</a></li>
                                    <li><a _href="<?php echo site_url('Weixin/menu') ?>" href="javascript:void(0)">自定义菜单</a></li>
                                    <li><a _href="<?php echo site_url('Weixin/reply') ?>" href="javascript:void(0)">关注回复</a></li>
                                </ul>
                            </dd>
                        </dl>
                        <dl id="menu-product">
                            <dt><i class="Hui-iconfont">&#xe620;</i> APP管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                            <dd>
                                <ul>
                                    <li><a _href="<?php echo site_url('userlog/index') ?>" href="javascript:void(0)">操作日志</a></li>
                                    <li><a _href="<?php echo site_url('userlog/update') ?>" href="javascript:void(0)">APP版本</a></li>
                                </ul>
                            </dd>
                        </dl>
                    <dl id="menu-product">
                  					<dt><i class="Hui-iconfont">&#xe620;</i> 场景管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                  					<dd>
                  						<ul>
                  							<li><a _href="<?php echo site_url('scene') ?>" data-title="分类管理" href="javascript:void(0)">分类管理</a></li>
                   						</ul>
                  					</dd>
                  				</dl>
                  				<dl id="menu-product">
                  					<dt><i class="Hui-iconfont">&#xe620;</i> 代理商管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                  					<dd>
                  						<ul>

                  							<li><a _href="<?php echo site_url('agency') ?>" data-title="管理列表" href="javascript:void(0)">管理列表</a></li>
                  						</ul>
                  					</dd>
                  				</dl>-->


                    <?php    }?>




            <?php    }?>
    </div>

<?php $this->load->view('footer');?>

<script type="text/javascript">
/*资讯-添加*/
function article_add(title,url){
    var index = layer.open({
        type: 2,
        title: title,
        content: url
    });
    layer.full(index);
}
/*图片-添加*/
function picture_add(title,url){
    var index = layer.open({
        type: 2,
        title: title,
        content: url
    });
    layer.full(index);
}
/*产品-添加*/
function product_add(title,url){
    var index = layer.open({
        type: 2,
        title: title,
        content: url
    });
    layer.full(index);
}
/*用户-添加*/
function member_add(title,url,w,h){
    layer_show(title,url,w,h);
}
</script>
<script type="text/javascript">
// var _hmt = _hmt || [];
// (function() {
//   var hm = document.createElement("script");
//   hm.src = "//hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
//   var s = document.getElementsByTagName("script")[0];
//   s.parentNode.insertBefore(hm, s)})();
// var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
// document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F080836300300be57b7f34f4b3e97d911' type='text/javascript'%3E%3C/script%3E"));
</script>
</body>
</html>
