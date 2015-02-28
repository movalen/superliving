<?php
/*
 * Public Controller
 */
class Base_Controller extends MX_Controller {
 
    public function __construct() {
        parent::__construct();
        $this->template->title("My Codeigniter");
		$this->template->set_layout("default/layout");
		
		#$value = new Coverpage();
	#	$value->where("status",1)->where("start_date <=",date("Y-m-d"))->where("end_date <=",date("Y-m-d"))->order_by("created","DESC")->get(1);
	#	$this->template->append_metadata(js_notify());
	#	if($value->id) {
			
	#	}
		
		
		//Check user status
		
    }
	
	public function captcha() {
		$this->load->library("captcha");
		$captcha = new Captcha();
		$captcha->size = 6;
		$captcha->session = "captcha";
		$captcha->display();
	}
	
}
/*
class Public_Controller extends Base_Controller {
 
    public function __construct() {
        parent::__construct();
        
		$pathinfo_ = explode('/', $_SERVER['PATH_INFO']);
		$pathinfo = '';
		foreach($pathinfo_ as $item) {
			if(!empty($item) && $pathinfo == '') {
				$pathinfo .= $item;
			} else if(!empty($item)) {
				$pathinfo .= '/'.$item;
			}	
		}
    }
}
*/
class Public_Controller extends Base_Controller {
 
    public function __construct() {
        parent::__construct();
        $this->template->title("Super Living Co.,Ltd.");
		$this->template->set_layout("default/layout");
		
		#$value = new Coverpage();
		#$value->where("status",1)->where("start_date <=",date("Y-m-d"))->where("end_date <=",date("Y-m-d"))->order_by("created","DESC")->get(1);
	#	$this->template->append_metadata(js_notify());
		
    }
	
	public function captcha() {
		$this->load->library("captcha");
		$captcha = new Captcha();
		$captcha->size = 6;
		$captcha->session = "captcha";
		$captcha->display();
	}
}
 
/*
 * Admin Controller
 * Required login
 */
class Admin_each_Controller extends Base_Controller {
	public function __construct() {
        parent::__construct();
        $this->template->title("Admin");
		$this->template->set_layout("admin/startbootstrap-sb-admin-1.0.0/index");
	}
}
class Admin_Controller extends Admin_each_Controller {
    public function __construct() {
        parent::__construct();
		
		if(!is_login()) {
			redirect('admin/signin');
		}
	} 
}

/*
 * Template Controller
 * Test CodeIgniter Template
 */
class Template_Controller extends MX_Controller {

	public function __Construct() {
		parent::__construct();

		$data = array(
				"blog_title"	=>	"สำนักโรคจากการประกอบอาชีพ และสิ่งแวดล้อม",
				"body"			=>	"Body",
			);

		$this->parser->parse("admin/layout",$data);
	}

}