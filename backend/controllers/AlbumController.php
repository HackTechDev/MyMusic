<?php

namespace backend\controllers;

use Yii;
use backend\models\Album;
use backend\models\AlbumSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * AlbumController implements the CRUD actions for Album model.
 */
class AlbumController extends Controller
{
/*
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
*/

    public function behaviors()
    {
        return [
        'access' => [
            'class' => \yii\filters\AccessControl::className(),
            'only' => ['index', 'create', 'update', 'delete'],
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['@'],
                ],
              ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }



    /**
     * Lists all Album models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlbumSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Album model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Album model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Album();

        if ($model->load(Yii::$app->request->post())) {

            $model->frontcoverfile = UploadedFile::getInstance($model, 'frontcoverfile');
            if( $model->frontcoverfile != null) {
                $filename =  str_replace(" ", "_", strtolower($model->title)) . '_fc.' . $model->frontcoverfile->extension;
                $model->frontcoverfile->saveAs('uploads/'  . $filename);
                $model->frontcover = 'uploads/'  . $filename;
            } else {
                 $model->frontcover = 'uploads/no_fc.jpg';
            }

            $model->backcoverfile = UploadedFile::getInstance($model, 'backcoverfile');
            if( $model->backcoverfile != null) {
                $filename =  str_replace(" ", "_", strtolower($model->title)) . '_bc.' . $model->frontcoverfile->extension;
                $model->backcoverfile->saveAs('uploads/' . $filename);
                $model->backcover  = 'uploads/'  . $filename;
            } else {
                $model->backcover = 'uploads/no_bc.jpg';
            }

            $model->createdat = date('Y-m-d h:m:s');
            $model->updatedat = date('Y-m-d h:m:s');
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Album model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->frontcoverfile = UploadedFile::getInstance($model, 'frontcoverfile');
            if( $model->frontcoverfile != null) {
                $filename =  str_replace(" ", "_", strtolower($model->title)) . '_fc.' . $model->frontcoverfile->extension;
                $model->frontcoverfile->saveAs('uploads/'  . $filename);
                $model->frontcover = 'uploads/'  . $filename;
            } else {
                 $model->frontcover = 'uploads/no_fc.jpg';
            }

            $model->backcoverfile = UploadedFile::getInstance($model, 'backcoverfile');
            if( $model->backcoverfile != null) {
                $filename =  str_replace(" ", "_", strtolower($model->title)) . '_bc.' . $model->frontcoverfile->extension;
                $model->backcoverfile->saveAs('uploads/' . $filename);
                $model->backcover  = 'uploads/'  . $filename;
            } else {
                $model->backcover = 'uploads/no_bc.jpg';
            }

            $model->updatedat = date('Y-m-d h:m:s');
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Album model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Album model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Album the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Album::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
