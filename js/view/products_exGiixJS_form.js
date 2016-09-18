
//alert('');
//alert('');

jun.Products_exGiixWin = Ext.extend(Ext.Window, {
    title: 'Products_exGiix',
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
                id:'form-Products_exGiix',
                labelWidth: 100,
                labelAlign: 'left',
                layout: 'form',
                ref:'formz',
                border:false,
                items: [
                                                                                     {
                                    xtype: 'textfield',
                                    fieldLabel: 'catID',
                                    hideLabel:false,
                                    //hidden:true,
                                    name:'catID',
                                    id:'catIDid',
                                    ref:'../catID',
                                    maxLength: 12,
                                    //allowBlank: ,
                                    anchor: '100%'
                                }, 
                                                                     {
                                    xtype: 'textfield',
                                    fieldLabel: 'supID',
                                    hideLabel:false,
                                    //hidden:true,
                                    name:'supID',
                                    id:'supIDid',
                                    ref:'../supID',
                                    maxLength: 12,
                                    //allowBlank: ,
                                    anchor: '100%'
                                }, 
                                                                     {
                                    xtype: 'textfield',
                                    fieldLabel: 'item',
                                    hideLabel:false,
                                    //hidden:true,
                                    name:'item',
                                    id:'itemid',
                                    ref:'../item',
                                    maxLength: 255,
                                    //allowBlank: ,
                                    anchor: '100%'
                                }, 
                                                                     {
                                    xtype: 'textfield',
                                    fieldLabel: 'price',
                                    hideLabel:false,
                                    //hidden:true,
                                    name:'price',
                                    id:'priceid',
                                    ref:'../price',
                                    maxLength: 19,
                                    //allowBlank: ,
                                    anchor: '100%'
                                }, 
                                                                     {
                                    xtype: 'textfield',
                                    fieldLabel: 'type',
                                    hideLabel:false,
                                    //hidden:true,
                                    name:'type',
                                    id:'typeid',
                                    ref:'../type',
                                    maxLength: 30,
                                    //allowBlank: ,
                                    anchor: '100%'
                                }, 
                                                                     {
                                    xtype: 'textfield',
                                    fieldLabel: 'modelID',
                                    hideLabel:false,
                                    //hidden:true,
                                    name:'modelID',
                                    id:'modelIDid',
                                    ref:'../modelID',
                                    maxLength: 30,
                                    //allowBlank: ,
                                    anchor: '100%'
                                }, 
                                                                     {
                                    xtype: 'textfield',
                                    fieldLabel: 'itemDesc',
                                    hideLabel:false,
                                    //hidden:true,
                                    name:'itemDesc',
                                    id:'itemDescid',
                                    ref:'../itemDesc',
                                    maxLength: 100,
                                    //allowBlank: ,
                                    anchor: '100%'
                                }, 
                                                                     {
                                    xtype: 'textfield',
                                    fieldLabel: 'weight',
                                    hideLabel:false,
                                    //hidden:true,
                                    name:'weight',
                                    id:'weightid',
                                    ref:'../weight',
                                    maxLength: 20,
                                    //allowBlank: ,
                                    anchor: '100%'
                                }, 
                                                                     {
                            xtype: 'datefield',
                            ref:'../createDate',
                            fieldLabel: 'createDate',
                            name:'createDate',
                            id:'createDateid',
                            format: 'd M Y',
                            //allowBlank: ,
                            anchor: '100%'                            
                        }, 
                                                                     {
                            xtype: 'datefield',
                            ref:'../modifiedDate',
                            fieldLabel: 'modifiedDate',
                            name:'modifiedDate',
                            id:'modifiedDateid',
                            format: 'd M Y',
                            //allowBlank: ,
                            anchor: '100%'                            
                        }, 
                                                   
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
        jun.Products_exGiixWin.superclass.initComponent.call(this);
        this.on('activate', this.onActivate, this);
        this.btnSaveClose.on('click', this.onbtnSaveCloseClick, this);
        this.btnSave.on('click', this.onbtnSaveclick, this);
        this.btnCancel.on('click', this.onbtnCancelclick, this);       
        
    },
    
    onActivate: function(){
              
        this.btnSave.hidden = false;
        
    },
            
    saveForm : function()
    {       
            var urlz;
     
            if(this.modez == 1 || this.modez== 2) {
                    //urlz= '/Products_exGiix/update/id/' + this.id;
                    urlz= 'nama controller/Products_exGiix/update/id/' + this.id;
                } else {
                    //urlz= '/Products_exGiix/create/';
                    urlz= 'nama controller /Products_exGiix/create/';
                }
             
            Ext.getCmp('form-Products_exGiix').getForm().submit({
                url:urlz,                
                /*
                params:{                                  
                  tglpeljlo: this.tglpeljlo,
                  jenpeljlo: this.jenpeljlo,
                  modez: this.modez
                },*/
                timeOut: 1000,
                waitMsg: 'Sedang Proses',
                scope: this,

                success: function(f,a){
                    jun.rztProducts_exGiix.reload();
                    
                    var response = Ext.decode(a.response.responseText);
         
                    if(this.closeForm){
                    
                        this.close();
                    
                    }else{
                        if(response.data != undefined){
                            Ext.MessageBox.alert("Pelayanan",response.data.msg);
                        }
                        if(this.modez == 0){
                            Ext.getCmp('form-Products_exGiix').getForm().reset();
                        }
                    }
                    
                },

                failure: function(f,a){
                    Ext.MessageBox.alert("Error","Can't Communicate With The Server");
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