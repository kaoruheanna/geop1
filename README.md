# geop1
Para este ejercicio uso el framework Yii como base.
http://www.yiiframework.com

The Active Record attributes are named after the associated table columns in a case-sensitive manner. Yii automatically defines an attribute in Active Record for every column of the associated table. You should NOT redeclare any of the attributes. 

#Consideraciones
- Decidí utilizar Yii porque lo habia usado hace algunos años.
- Las operaciones de ABM se realizan con los metodos default de CActiveRecord
- Creo que las relations y las rules llegan a cubrir las validaciones de integridad de las Foreing Key, y hacen innecesario crear las clases de Favoritos y UsuariosPagos. No tuve oportunidad de probar el codigo para ver si efectivamente es asi o sera necesario realizar estas operaciones y validaciones de una forma mas manual.