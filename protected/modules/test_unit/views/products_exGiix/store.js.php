jun.configstore = Ext.extend(Ext.data.JsonStore, {
    constructor: function(cfg) {
        cfg = cfg || {};
        jun.configstore.superclass.constructor.call(this, Ext.apply({
            storeId: 'config',
            //url: 'index.php/site/user',
            //autoLoad: true,
            //reader:jun.myReader,
            root: 'results',
            totalProperty: 'total',
            fields: [
                
                {name:'proID'},
{name:'catID'},
{name:'supID'},
{name:'item'},
{name:'price'},
{name:'type'},
		/*
{name:'modelID'},
{name:'itemDesc'},
{name:'weight'},
{name:'createDate'},
{name:'modifiedDate'},
		*/
                
            ]
        }, cfg));
    }
});
