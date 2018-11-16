function getChildren(id){
    let data = [
        {"id":"1","pid":"","slug":"mobile-phones"},
        {"id":"2","pid":"1","slug":"no-slug-1"},
        {"id":"3","pid":"2","slug":"no-slug-3"},
        {"id":"4","pid":"3","slug":"no-slug-4"},
        {"id":"5","pid":"3","slug":"no-slug-5"},
        {"id":"6","pid":"3","slug":"no-slug-6"},
        {"id":"7","pid":"3","slug":"no-slug-7"},
        {"id":"8","pid":"4","slug":"no-slug-8"},
        {"id":"9","pid":"4","slug":"slug2-1"},
        {"id":"10","pid":"1","slug":"slug2-2"},
        {"id":"11","pid":"2","slug":"slug2-3"},
        {"id":"12","pid":"2","slug":"slug2-4"},
        {"id":"13","pid":"2","slug":"slug3-1"},
        {"id":"14","pid":"3","slug":"slug3-2"},
        {"id":"15","pid":"3","slug":"slug3-6"},
        {"id":"16","pid":"3","slug":"slug3-7"}
    ];
    let categories = [
        {	id:'1',
            slug:'Electronics',
            pid:''
        },
        {	id:'2',
            slug:'Tablets',
            pid:'14'
        },
        {	id:'3',
            slug:'Home Appliances',
            pid:'1'
        },
        {	id:'4',
            slug:'Television',
            pid:'3'
        },
        {	id:'5',
            slug:'Fashion',
            pid:''
        },
        {	id:'6',
            slug:'Mens Clothes',
            pid:'5'
        },
        {	id:'7',
            slug:'Baby Fashion',
            pid:'5'
        },
        {	id:'8',
            slug:'Apple Tablets',
            pid:'2'
        },
        {	id:'9',
            slug:'Men\'s T-Shirts',
            pid:'6'
        },
        {	id:'10',
            slug:'Android',
            pid:'11'
        },
        {	id:'11',
            slug:'Operating System',
            pid:''
        },
        {	id:'12',
            slug:'iOS',
            pid:'11'
        },
        {	id:'13',
            slug:'PC & Laptops',
            pid:'14'
        },
        {	id:'14',
            slug:'Gadgets',
            pid:'1'
        },
        {	id:'15',
            slug:'Mobile Phones',
            pid:'14'
        },
        {	id:'16',
            slug:'Wearables',
            pid:'14'
        },
        {	id:'17',
            slug:'Smart Watch',
            pid:'16'
        },
        {	id:'18',
            slug:'Smart Pods',
            pid:'16'
        },
        {	id:'19',
            slug:'DVD',
            pid:'3'
        },
        {	id:'20',
            slug:'Kitchen Equiptments',
            pid:'3'
        },
        {	id:'21',
            slug:'Gas Burner',
            pid:'20'
        },
        {	id:'22',
            slug:'Smart Lights',
            pid:'3'
        },
        {	id:'23',
            slug:'Smart TV',
            pid:'3'
        },
        {	id:'24',
            slug:'HP',
            pid:'13'
        },
        {	id:'25',
            slug:'Dell',
            pid:'13'
        },
        {	id:'26',
            slug:'Mac Books',
            pid:'13'
        },
        {	id:'27',
            slug:'Laptop Accesories',
            pid:'13'
        },
        {	id:'28',
            slug:'iPad',
            pid:'8'
        },
        {	id:'29',
            slug:'iPhones',
            pid:'15'
        }
    ];

    cur_cat = categories[(id-1)];
    cur_id = cur_cat.id;
    name = cur_cat.slug;
    child_arr = [], child_id_arr = [];

    for (var i = 0; i < categories.length; i++) {
        let in_cat = categories[i];
        if (in_cat.pid == cur_id) {
            child_arr.push(in_cat.slug);
            child_id_arr.push(in_cat.id);
        }
    }
    console.log('Children of ' + name + ': ' + child_arr);
    child_id_arr.forEach(function(e){
        getChildren(e);
    });

};