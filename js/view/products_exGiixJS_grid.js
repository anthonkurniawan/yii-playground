jun.Products_exGiixGrid=Ext.extend(Ext.grid.GridPanel ,{        
	title:"Products_exGiix",
        id:'docs-jun.Products_exGiixGrid',
	width:400,
	height:250,
        sm: new Ext.grid.RowSelectionModel({singleSelect:true}),
	columns:[
                        {
			header:'proID',
			sortable:true,
			resizable:true,                        
                        dataIndex:'proID',
			width:100
		},
                                {
			header:'catID',
			sortable:true,
			resizable:true,                        
                        dataIndex:'catID',
			width:100
		},
                                {
			header:'supID',
			sortable:true,
			resizable:true,                        
                        dataIndex:'supID',
			width:100
		},
                                {
			header:'item',
			sortable:true,
			resizable:true,                        
                        dataIndex:'item',
			width:100
		},
                                {
			header:'price',
			sortable:true,
			resizable:true,                        
                        dataIndex:'price',
			width:100
		},
                                {
			header:'type',
			sortable:true,
			resizable:true,                        
                        dataIndex:'type',
			width:100
		},
                		/*
                {
			header:'modelID',
			sortable:true,
			resizable:true,                        
                        dataIndex:'modelID',
			width:100
		},
                                {
			header:'itemDesc',
			sortable:true,
			resizable:true,                        
                        dataIndex:'itemDesc',
			width:100
		},
                                {
			header:'weight',
			sortable:true,
			resizable:true,                        
                        dataIndex:'weight',
			width:100
		},
                                {
			header:'createDate',
			sortable:true,
			resizable:true,                        
                        dataIndex:'createDate',
			width:100
		},
                                {
			header:'modifiedDate',
			sortable:true,
			resizable:true,                        
                        dataIndex:'modifiedDate',
			width:100
		},
                		*/
		
	],
	initComponent: function(){
	this.store = jun.rztProducts_exGiix;
        this.bbar = {
            items: [
           {
            xtype: 'paging',
            store: this.store,
            displayInfo: true,
            pageSize: 10
           }]
        };
            
           this.tbar = {
                xtype: 'toolbar',
                items: [
                    {
                        xtype: 'button',
                        text: 'Add',
                        ref: '../btnAdd'
                    },
                    {
                        xtype: 'button',
                        text: 'Edit',
                        ref: '../btnEdit'
                    },                    
                    {
                        xtype: 'button',
                        text: 'Delete',
                        ref: '../btnDelete'
                    }
                ]
            };
		jun.Products_exGiixGrid.superclass.initComponent.call(this);
	        this.btnAdd.on('Click', this.loadForm, this);
                this.btnEdit.on('Click', this.loadEditForm, this);
                this.btnDelete.on('Click', this.deleteRec, this);
                this.getSelectionModel().on('rowselect', this.getrow, this);
	},
        
        getrow: function(sm, idx, r){
            this.record = r;

            var selectedz = this.sm.getSelections();
        },
        
        loadForm: function(){
            var form = new jun.Products_exGiixWin({modez:0});
            form.show();
        },
        
        loadEditForm: function(){
            
            var selectedz = this.sm.getSelected();
            
            //var dodol = this.store.getAt(0);
             if(selectedz == ""){
                 Ext.MessageBox.alert("Warning","Anda belum memilih Jenis Pelayanan");
                 return;
             }
            var idz = selectedz.json.id;
            var form = new jun.Products_exGiixWin({modez:1, id:idz});
            form.show(this);
            form.formz.getForm().loadRecord(this.record);
        },
        
        deleteRec : function(){
            Ext.MessageBox.confirm('Pertanyaan','Apakah anda yakin ingin menghapus data ini?', this.deleteRecYes, this);
        },
        
        deleteRecYes : function(){
        
            var record = this.sm.getSelected();

            // Check is list selected
            if(record == ""){
                Ext.MessageBox.alert("Warning","Anda Belum Memilih Jenis Pelayanan");
                return;
            }

            Ext.Ajax.request({
                waitMsg: 'Please Wait',
                //url: '<?//php echo $this->getModule()->getName();?>/Products_exGiix/delete/id/' + record.json.id,
				 url: 'nama controller/Products_exGiix/delete/id/' + record.json.id,
                //url: 'index.php/api/Products_exGiix/delete/' + record[0].json.nosjp,
                method: 'POST',
                
                success: function(response){
                  jun.rztProducts_exGiix.reload();
                  Ext.Msg.alert('Pelayanan', 'Delete Berhasil');

                },
                failure: function(response){
                  Ext.MessageBox.alert('error','could not connect to the database. retry later');
                  }
             });
        
        }
});
