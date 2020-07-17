<?php
	
	class ListBlog extends Controller{
		public function __construct(){
			parent::__construct();

			$act = isset($_GET["act"])?$_GET["act"]:"";
			switch ($act) {
				case 'delete':
					$id = isset($_GET["id"])?$_GET["id"]:0;
					$this->Model->execute("delete from menu_list_blog where token='$id'");
					echo "<meta http-equiv='refresh' content='0; URL=index.php?controller=blog/list'>";
					break;
			}

			// dem tong so ban ghi
			$number = $this->Model->count("select * from menu_list_blog");
			// so ban ghi hien thi tren 1 trang
			$num_page = 6;
			// so trang can hien thi
			$page_show = ceil($number/$num_page);
			// lay trang hien tai tren thanh url
			$page = isset($_GET["p"])&&$_GET["p"]>0?$_GET["p"]:1;

			$form = ($page-1)*$num_page;

			$data = $this->Model->fetch("select * from menu_list_blog order by id desc limit $form,$num_page");

			include "views/blog/listView.php";
		}
	}
	new ListBlog();

?>