<?php

namespace myTestWeb\helloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;
use myTestWeb\helloBundle\Entity\user;


class DefaultController extends Controller
{
    /**
     * @Route("hai")
     */
    public function indexAction()
    {
        $t = $this->getDoctrine()->getRepository('myTestWebhelloBundle:user')->findAll();
        return $this->render('myTestWebhelloBundle:Default:index.html.twig', array('users'=>$t) );
    }
	/**
     * @Route("hai/list")
     */
    public function listAction()
    {
        $t = $this->getDoctrine()->getRepository('myTestWebhelloBundle:user')->findAll();
        return $this->render('myTestWebhelloBundle:Default:index.html.twig', array('users'=>$t) );
    }
	/**
     * @Route("hai/reg")
     */
    public function regAction()
    {
        return $this->render('myTestWebhelloBundle:Default:reg.html.twig');
    }
	/**
     * @Route("hai/do_reg")
     */
    public function do_regAction()
    {
//  	$data['username'] = $this->getRequest()->get('username');
//  	$data['pwd1'] = $this->getRequest()->get('pwd');
//  	$data['pwd2'] = $this->getRequest()->get('pwd2');
		$data['username'] =$_POST['username'];
    	$data['pwd1'] = $_POST['pwd'];
    	$data['pwd2'] = $_POST['pwd2'];
		
		$user = new user();
		$user->setUsername($data['username']);//设置用户 名称
		$user->setPassword($data['pwd1']);//设置用户密码
		$m_db = $this->getDoctrine()->getManager();//获取注册对象
		$m_db->persist($user);//生成sql
		$res = $m_db->flush();// 提交执行sql
		
		$t = $this->getDoctrine()->getRepository('myTestWebhelloBundle:user')->findAll();//获取所有数据
        return $this->render('myTestWebhelloBundle:Default:index.html.twig', array('users'=>$t) );
    }
	
	
}
