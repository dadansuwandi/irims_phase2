	<!-- BEGIN DEFINE VARIABLE-->
	<?php 
		$menus = $this->user_model->getSideBar();
		$url = uri_string();
		$idBar =  $this->user_model->getidByUrl($url);
		
		$module 	= $this->uri->segment(1);
		$page   	= $this->uri->segment(2);
		$action 	= 'index';
		$actionTmp 	= $this->uri->segment(3);
		if($actionTmp != ''){
			$action =  $this->uri->segment(3);
		}
		//echo ($_url)
	?>
	<!-- END DEFINE VARIABLE-->
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu page-sidebar-menu-light" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- BEGIN SEARCH WRAPPER -->
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
					<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
				
					<br>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<!-- END SEARCH WRAPPER -->
				<!-- BEGIN LOOPING MENUS -->
				<?php 
				foreach ($menus as $url => $label):
					if (!$this->acl->is_allowed($label['url']==null ?'':$label['url'])) continue;
				?>
			
				<li class="start <?php if ($idBar == $label['id']) echo 'active open'; ?>">
				
				   <a href="javascript:;<?php echo  $label['url']?>">
					<i class="<?php echo $label['icon']?>"></i>
					<span class="title"><?php echo $label['label']?></span>
					<!-- BEGIN DEFAULT CSS SELECTED MENU -->
					<?php if ($module != 'welcome') { ?>
					<span class="selected"></span>
					<span class="arrow "></span>
					<?php } else { ?>
					<span class="selected"></span>
					<span class="arrow open"></span>
					<?php } ?>
					<!-- END DEFAULT CSS SELECTED MENU -->
					</a>
					<?php
					if (is_array($label['sub_nav'])):
					?>
					<ul id="<?php echo $label['url']?>" class="sub-menu">
						<?php foreach ($label['sub_nav'] as $sub_url => $sub_label): ?>
							
						<!-- Just for GROUP_RISK_HEADQUARTERS & GROUP_RISK_OWNER -->
						<?php if ($this->session->userdata('role_id') == GROUP_RISK_HEADQUARTERS || $this->session->userdata('role_id') == GROUP_RISK_OWNER) { ?>
						
						<?php if ($sub_url == 'welcome/index_corporate_worksheet' || $sub_url == 'welcome/index_residual_worksheet' || $sub_url == 'welcome/index_kri' || $sub_url == 'welcome/index_profile_kri') continue; ?>

						<?php if (!$this->acl->is_allowed($sub_url)) continue; ?>
						<?php if($module != 'welcome'){ ?>
						<li class="<?php if (substr(uri_string(), 0, strlen($sub_url)) == $sub_url) echo 'active'; ?>">
						<?php } else { ?>
						<li class="start active open">
						<?php } ?>
							<a href="<?php echo site_url($sub_url); ?>">
							<i class="<?php echo $sub_label['icon']?>"></i>
							<?php echo $sub_label['label']?></a>
						</li>

						<!-- Just for GROUP_RISK_LEADERS -->
						<?php } else if ($this->session->userdata('role_id') == GROUP_RISK_LEADERS || $this->session->userdata('role_id') == GROUP_RISK_BOD) { ?>
						
						<?php if ($sub_url == 'welcome/index_residual_worksheet' || $sub_url == 'welcome/index_residual') continue; ?>

						<?php if (!$this->acl->is_allowed($sub_url)) continue; ?>
						<?php if($module != 'welcome'){ ?>
						<li class="<?php if (substr(uri_string(), 0, strlen($sub_url)) == $sub_url) echo 'active'; ?>">
						<?php } else { ?>
						<li class="start active open">
						<?php } ?>
							<a href="<?php echo site_url($sub_url); ?>">
							<i class="<?php echo $sub_label['icon']?>"></i>
							<?php echo $sub_label['label']?></a>
						</li>

						<?php } else { ?>
						
						<?php if (!$this->acl->is_allowed($sub_url)) continue; ?>
						<?php if($module != 'welcome'){ ?>
						<li class="<?php if (substr(uri_string(), 0, strlen($sub_url)) == $sub_url) echo 'active'; ?>">
						<?php } else { ?>
						<li class="start active open">
						<?php } ?>
							<a href="<?php echo site_url($sub_url); ?>">
							<i class="<?php echo $sub_label['icon']?>"></i>
							<?php echo $sub_label['label']?></a>
						</li>

						<?php } ?>

						<?php endforeach; ?>
					</ul>
					<?php
					endif;
					?>
				</li>
				<?php 
				endforeach;
				?>
				
				
				
				
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->