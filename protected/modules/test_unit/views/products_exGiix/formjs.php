jun.pengajuanUi = Ext.extend(Ext.Window, {
    title: 'Tambah Pelayanan Kesehatan',
    modez:1,
    width: 400,
    height: 300,
    layout: 'form',
    modal: true,
    padding: 5,
    closeForm: false,    
    initComponent: function() {
        this.items = [
            {
                xtype: 'form',
                frame: false,
                bodyStyle: 'background-color: #DFE8F6; padding: 10px',
                id:'form-pelkesrjtl',
                labelWidth: 100,
                labelAlign: 'left',
                layout: 'form',
                ref:'formz',
                border:false,
                items: [
                                                                                    
                    <?php echo $form->labelEx($model,'catID'); ?>
                    <?php echo $form->textField($model, 'catID'); ?>
                    <?php echo $form->error($model,'catID'); ?>
                    
                                                                    
                    <?php echo $form->labelEx($model,'supID'); ?>
                    <?php echo $form->textField($model, 'supID'); ?>
                    <?php echo $form->error($model,'supID'); ?>
                    
                                                                    
                    <?php echo $form->labelEx($model,'item'); ?>
                    <?php echo $form->textField($model, 'item', array('maxlength' => 255)); ?>
                    <?php echo $form->error($model,'item'); ?>
                    
                                                                    
                    <?php echo $form->labelEx($model,'price'); ?>
                    <?php echo $form->textField($model, 'price', array('maxlength' => 19)); ?>
                    <?php echo $form->error($model,'price'); ?>
                    
                                                                    
                    <?php echo $form->labelEx($model,'type'); ?>
                    <?php echo $form->textField($model, 'type', array('maxlength' => 30)); ?>
                    <?php echo $form->error($model,'type'); ?>
                    
                                                                    
                    <?php echo $form->labelEx($model,'modelID'); ?>
                    <?php echo $form->textField($model, 'modelID', array('maxlength' => 30)); ?>
                    <?php echo $form->error($model,'modelID'); ?>
                    
                                                                    
                    <?php echo $form->labelEx($model,'itemDesc'); ?>
                    <?php echo $form->textField($model, 'itemDesc', array('maxlength' => 100)); ?>
                    <?php echo $form->error($model,'itemDesc'); ?>
                    
                                                                    
                    <?php echo $form->labelEx($model,'weight'); ?>
                    <?php echo $form->textField($model, 'weight', array('maxlength' => 20)); ?>
                    <?php echo $form->error($model,'weight'); ?>
                    
                                                                    
                    <?php echo $form->labelEx($model,'createDate'); ?>
                    <?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'createDate',
			'value' => $model->createDate,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
                    <?php echo $form->error($model,'createDate'); ?>
                    
                                                                    
                    <?php echo $form->labelEx($model,'modifiedDate'); ?>
                    <?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'modifiedDate',
			'value' => $model->modifiedDate,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
                    <?php echo $form->error($model,'modifiedDate'); ?>
                    
                                                    {
                        xtype: 'textfield',
                        fieldLabel: 'No. SJP',
                        hideLabel:true,
                        hidden:true,
                        name:'nosjp',
                        id:'nosjpid',
                        ref:'../nosjp',
                        anchor: '100%'
                    },
                    {
                        xtype: 'datefield',
                        fieldLabel: 'Tanggal Layanan',
                        name:'tglpeljl',
                        id:'tglpeljl',
                        format: 'd M Y',
                        anchor: '100%',
                        allowBlank: false,
                        ref: '../tglpeljl'
                       // value: this.tglsjp
                    },
                    /*
                    {
                        xtype: 'datefield',
                        //xtype: 'textfield',
                        fieldLabel: 'Tanggal layan',
                        format: 'M d Y h:i:s:uA',
                        name:'tglpeljl',
                        id:'tglpeljl',
                        anchor: '100%'
                    },*/ new jun.poliCombo({hiddenName:'polijl', store: jun.rztPoli, allowBlank:false})
                    , new jun.dokterCombo({name:'dokterjl', hiddenName:'dokterjl', store: jun.rztDokter, allowBlank: false})
                    , new jun.jenpelCombo({fieldLabel: 'Nama Pelayanan', ref:'../cmbjenpel', id:'jenpeljlid', name:'jenpeljl', hiddenName:'jenpeljl', store: jun.rztJenpel, allowBlank: false})
                    ,{
                        xtype: 'textfield',
                        ref:'../biaya',
                        fieldLabel: 'Biaya',
                        id:'bytagpeljlid',
                        name:'bytagpeljl',
                        anchor: '100%',
                        allowBlank: false,
                        //maxLength: 8,
                        maskRe: /([0-9.]+)$/,
                               plugins: 'currency',
                                currencyConfig: {
                                symbolBeforeAmount: true,
                                currencySymbol: '', //  = euro sign in unicode
                                decimalSeparator: ',',
                                thousandsSeparator: '.'
                            }
                    }
                    ,{
                        xtype: 'fieldset',
                        title: 'Verifikasi',
                        layout: 'form',
                        hidden:true,
                        collapsible: false,
                        id:'veriffield',
                        ref:'../veriffield',
                        items: [
                            new jun.jenpelCombo({ref:'../../cmbjenpelver', id:'jenpelverjlid',
                                fieldLabel: 'Nama Pelayanan', name:'jenpelverjl', hiddenName:'jenpelverjl',
                                store: jun.rztJenpelver, allowBlank:false}),
                            {
                                xtype: 'textfield',
                                id:'byverpeljlid',         
                                name: 'byverpeljl',
                                fieldLabel: 'Biaya Verifikasi',
                                //name:'byverpeljl',
                                anchor: '100%',
                                allowBlank: false,
                                //maxLength: 8,
                                maskRe: /([0-9.]+)$/,
                                plugins: 'currency',
                                currencyConfig: {
                                    symbolBeforeAmount: true,
                                    currencySymbol: '', //  = euro sign in unicode
                                    decimalSeparator: ',',
                                    thousandsSeparator: '.'
                                }
                            },
                            {
                                 xtype: 'checkbox',
                                 name: 'rjtlEkses',
                                 fieldLabel: 'Ekses',
                                 boxLabel: 'Tandai Sebagai Ekses Klaim',
                                 value: '1'
                            },
                            {
                                 xtype: 'textarea',
                                 id: 'alasanpeljl',
                                 name: 'alasanpeljl',
                                 fieldLabel: 'Catatan',
                                 anchor: '100%'
                            }
                        ]
                    }
                  ]
            }];
        this.fbar = {
            xtype: 'toolbar',
            items: [
                {
                    xtype: 'button',
                    text: 'Simpan',
                    hidden: false,
                    ref:'../btnSave'
                },
                {
                    xtype: 'button',
                    text: 'Simpan & Tutup',
                    ref: '../btnSaveClose'
                },
                {
                    xtype: 'button',
                    text: 'Batal',
                    ref:'../btnCancel'
                }
            ]
        };
        jun.pengajuanUi.superclass.initComponent.call(this);
        this.on('activate', this.onActivate, this);
        this.btnSaveClose.on('click', this.onbtnSaveCloseClick, this);
        this.btnSave.on('click', this.onbtnSaveclick, this);
        this.btnCancel.on('click', this.onbtnCancelclick, this);
        
        this.biaya.on('specialkey', function(field,e){

                if(e.getKey() == e.ENTER){
                    //alert("Test");
                    this.onbtnSaveclick();
                }

        }, this);
    },
    
    onActivate: function(){
              
        this.btnSave.hidden = false;
        
    },
            
    saveForm : function()
    {       
            var urlz;
     
            if(this.modez == 1 || this.modez== 2) {
                    //urlz='index.php/datpelkesrjtl/update/' + this.nosjp.getValue();
                    urlz='index.php/datpelkesrjtl/update2';                
                }else{
                    urlz='index.php/datpelkesrjtl/create/';
                }
             
            Ext.getCmp('form-pelkesrjtl').getForm().submit({
                url:urlz,                
                params:{                                  
                  tglpeljlo: this.tglpeljlo,
                  jenpeljlo: this.jenpeljlo,
                  modez: this.modez
                },
                timeOut: 1000,
                waitMsg: 'Sedang Proses',
                scope: this,

                success: function(f,a){
                    jun.rztRjtl.reload();
                    
                    var response = Ext.decode(a.response.responseText);
         
                    if(this.closeForm){
                    
                        this.close();
                    
                    }else{
                        if(response.data != undefined){
                            Ext.MessageBox.alert("Pelayanan",response.data.msg);
                        }
                        if(this.modez == 0){
                            Ext.getCmp('form-pelkesrjtl').getForm().reset();
                        }
                    }
                    
                },

                failure: function(f,a){
                    
                       if(a.result != undefined){
                            if(Ext.getCmp(a.result.data.id) != undefined){
                              Ext.Msg.alert('Error', a.result.data.msg);
                              Ext.getCmp(a.result.data.id).markInvalid(a.result.data.msg);
                            }else{
                              Ext.Msg.alert("Error",a.result.data.msg);
                            }
                        }else{
                            Ext.MessageBox.alert("Error","Can't Communicate With The Server");
                        }
                        
                }

            });

    },
    
    onbtnSaveCloseClick: function()
    {
        this.closeForm = true;
        this.saveForm(true);
    },
    
    onbtnSaveclick: function()
    {
        this.closeForm = false;
        this.saveForm(false);
    },
    onbtnCancelclick: function(){
        this.close();
    }
   
});