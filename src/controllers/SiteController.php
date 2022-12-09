<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Posts;

class SiteController extends Controller
{
   
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $posts = Posts::find()->all();
        return $this->render('index', ['posts' => $posts]);
    }

    public function actionCreate()
    {
        $post = new Posts();
        $request = Yii::$app->request;
        if ($post->load($request->post()) && $post->validate()) {
            $post->title = $post['title'];
            $post->content = $post['content'];
            $post->save();
            return $this->redirect(['site/index']);
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('create', ['post' => $post]);
        }
    }

    public function actionUpdate($id = NULL){
        $post = new Posts();
        $currenPost = Posts::findOne($id); 
        $request = Yii::$app->request;
        if ($post->load($request->post()) && $post->validate()) {
            $currenPost->title = $post['title'];
            $currenPost->content = $post['content'];
            $currenPost->save();
            return $this->redirect(['site/index']);
        }
        return $this->render('update', array(
            'post' => $currenPost
        ));
    }

    public function actionView($id = NULL){
        $post = Posts::findOne($id); 
        if ($post == NULL) {
            Yii::$app->session->setFlash('error', 'A post with that id does not exist');
		    Yii::$app->getResponse()->redirect(array('site/index'));
        }
        return $this->render('view', ['post' => $post]);
    }

    public function actionDelete($id = NULL) {
        $post = Posts::findOne($id);
        if ($post == NULL) {
            Yii::$app->session->setFlash('error', 'A post with that id does not exist');
		    Yii::$app->getResponse()->redirect(array('site/index'));
        }
        $post->delete();
        return $this->redirect(['site/index']);
    }

}
