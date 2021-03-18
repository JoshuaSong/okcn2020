<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fileimport extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
		$this->load->model('Aws_model');
		//$this->load->model('excel_import_model');
	//	$this->load->library('excel');
	//	$this->load->library('session');
	}
	public function sms($number,$messege)
	{
		print_r($this->Aws_model->SendAwsSms($number,$messege));
	}

	public function biblebook2db(){
		$filestr = file_get_contents('http://okcnradio.org/Html/BibleBook/bookName-zh-tw.html');
		$p1 = explode('</div><span class="ui-icon ui-icon-arrow-r ui-icon-shadow">&nbsp;</span></div></li>',$filestr);
		$i = 0;
		foreach($p1 as $item)
		{
			$i ++;
			$count = $this->getInbetweenStrings('chapter-amount="','">',$item);
			$name = strip_tags($item);
			if($i<67)
			{
				echo $i.':'.$name.$count.'<br>';
				$data['book_id'] =  $i;
				$data['lang'] =  'zh-tw';

				$data['count'] =  $count;

				$data['name'] =  $name;
				$this->db->insert('bible_book', $data);

			}
			
		}
		
	}
	public function biblebookdbchange()
	{
		$q =  $this->db->get('bible_book')->result();
		foreach($q as $row)
		{
			$data['lang'] = str_replace("zh-","",$row->lang);
			$this->db->where('id',$row->id);
			$this->db->update('bible_book',$data);
		
		}
	}

	public function gettodayprayer()
	{
		$homepage = file_get_contents('https://cornerstone.or.kr/?page_id=32361');
		$pid = explode('article id="post-',$homepage);
		$pid1 = explode('" class',$pid[1]);
		if($this->checkPrayerHasNotInputed($pid1[0]))
		{
		$prayer = file_get_contents('https://cornerstone.or.kr/?post_type=prayers&p='.$pid1[0]);
	//	echo $prayer;
		$cont = $this->getInbetweenStrings('<div class="entry-content py-8">','<!--',$prayer);
	//	echo $count;
		$sum = explode('<p>',$cont);
		$info = strip_tags($sum[1]);

		$data['prayer_id'] = $pid1[0];
		$data['prayer_title'] = $this->getInbetweenStrings('기도]','-',$prayer);
		$data['prayer_image'] =  $this->getInbetweenStrings('<img style="width:100%" src="','" alt="">',$prayer);
		$data['prayer_info'] =  $info;
		$data['prayer_cont'] =  strip_tags(str_replace($sum[1],'',$cont));
		$data['prayer_date'] =  $this->getInbetweenStrings('<small class="text-gray-400">','</small>',$prayer);
		$this->db->insert('today_prayer', $data); 
		$this->sendemail($data['prayer_date'].'[오늘의 기도]'.$data['prayer_title']);
	
		} 
		else
		{
			echo "Already Inputed!";

		}
		

	}
	public function checkPrayerHasNotInputed($pid)
	{
		$this->db->where('prayer_id',$pid);
		$this->db->limit(1);
		$query = $this->db->get('today_prayer');
		if($query->num_rows() > 0)
		{
		   return false;
		} else{
			return true;
		}

	}

	function getInbetweenStrings($start, $end, $str){
		$value = strstr($str, $start);
		$value = strstr($value, $end,true);
		$value = str_replace($start,'',$value);
		
		return $value;
	}

    function sendemail($str)
{
	//https://accounts.google.com/b/0/DisplayUnlockCaptcha
	//https://myaccount.google.com/lesssecureapps
	$this->load->library('email');
    $config['protocol'] = "smtp";
    $config['smtp_host'] = "ssl://smtp.googlemail.com";
    $config['smtp_port'] = "465";
    $config['smtp_user'] = 'vou.eradio@gmail.com';
    $config['smtp_pass'] = 'ahxnddlehf';
    $config['charset'] = "utf-8";
    $config['mailtype'] = "html";
    $config['newline'] = "\r\n";
    $config['charset'] = 'utf-8';
    $config['wordwrap'] = TRUE;
    $config['mailtype'] = 'html';
	$this->email->initialize($config);

    $this->email->from('vou.eradio@gmail.com', 'okcnRadio.org');
	$this->email->to('jmdsong@gmail.com'); 

    $this->email->subject('OKCN Radio Today Prayer Uploaded');

    $this->email->message($str);	
	$this->email->send();

}

public function youtubeupload()
{
    $plauylisturl="https://www.googleapis.com/youtube/v3/search?key=AIzaSyCc1KRpiyZgqZGcYf7R1QMvdjfvNkXfQ2M&channelId=UC2uvVVkQ1hXMOW7aPKjUJ8Q&part=snippet,id&order=date&maxResults=1";
    $playlist = json_decode(file_get_contents($plauylisturl), true);
   print_r($playlist) ;
}

public function youtube2db()
{
    //APIProject:      AIzaSyCu6L44d71ZEjrewUCihWKI8XqPyJlxbEA
    //My Project 75866  AIzaSyCc1KRpiyZgqZGcYf7R1QMvdjfvNkXfQ2M
    //eprayer:          AIzaSyCR0lVlgDETfU1IX9GuAJmNwpJvt3RIz28
    $q = $this->db->get('youtube_video');
    if($q->num_rows() > 50)
    {
        $this->db->where('id >',0);
        $this->db->delete('youtube_video');
        $this->db->query('ALTER TABLE youtube_video AUTO_INCREMENT 1');

    }
  
   $query = $this->db->get('youtube_channel');
   foreach($query->result() as $row)
   {
    
    $plauylisturl="https://www.googleapis.com/youtube/v3/search?key=AIzaSyCu6L44d71ZEjrewUCihWKI8XqPyJlxbEA&channelId=".$row->channel_id."&part=snippet,id&order=date&maxResults=10";
    $playlist = json_decode(file_get_contents($plauylisturl), true);
  


    foreach($playlist['items'] as  $item)
    {
	//	print_r($item);
	//	echo "*****************<br>";

		if($item['id']['kind'] == 'youtube#video')
		{
			  if($this->checkNotExist($item['id']['videoId']))
        {
            $data['video_id'] = $item['id']['videoId'];
            $data['video_title'] = $item['snippet']['title'];
            $data['video_date'] = $item['snippet']['publishedAt'];
            $data['channel_title'] = $item['snippet']['channelTitle'];
            $this->db->insert('youtube_video', $data);


		}
      
        }
       
    
    }
   }
 
}
public function checkNotExist($yid)
{
    $this->db->where('video_id',$yid);
    $this->db->limit(1);
    $q = $this->db->get('youtube_video');
    if($q->num_rows()>0)
    {
        return false;
    }else{
        return true;
    }
}
	public function checkuserstatus()
	{
		$this->db->where('id >',3000);
		$q = $this->db->get('users_main');
		foreach($q->result() as $row)
		{
			$this->db->where('pt_user_id',$row->id);
			$this->db->limit(1);
			$query = $this->db->get('program_touch');
			if($query->num_rows() == 0)
			{
				$this->db->where('id',$row->id);
				$this->db->delete('users_main');
			}
		}

	}

	public function changeurl()
	{
		$this->db->where('p_id <',1260);
		$query = $this->db->get('program_list');
		//print_r($query->result());
		foreach($query->result() as $row)
		{
			
			if(strpos($row->program_url, "https://dl.dropboxusercontent.com/u/385223495/") !== false)
				{
					$data["program_url"]= str_replace("https://dl.dropboxusercontent.com/u/385223495/","https://s3-us-west-2.amazonaws.com/cdsaws/",$row->program_url);
					//echo $data["program_url"].'<br/>';
					$this->db->where('p_id',$row->p_id);
					$this->db->update('program_list',$data);
				} 

		}

	}
	
}

?>