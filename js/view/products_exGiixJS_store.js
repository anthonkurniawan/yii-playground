jun.Products_exGiixstore = Ext.extend(Ext.data.JsonStore, {
    constructor: function(cfg) {
        cfg = cfg || {};
        jun.Products_exGiixstore.superclass.constructor.call(this, Ext.apply({
            storeId: 'Products_exGiixStoreId',
            //url: '/Products_exGiix/?output=json',           
			 url: 'nama cotroller/Products_exGiix/?output=json',    
            root: 'results',
            totalProperty: 'total',
            fields: [                
                {name:'proID'},
{name:'catID'},
{name:'supID'},
{name:'item'},
{name:'price'},
{name:'type'},
{name:'modelID'},
{name:'itemDesc'},
{name:'weight'},
{name:'createDate'},
{name:'modifiedDate'},
                
            ]
        }, cfg));
    }
});
jun.rztProducts_exGiix = new jun.Products_exGiixstore();
jun.rztProducts_exGiix.load();
