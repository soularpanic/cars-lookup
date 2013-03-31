var TRSLookupModule = function() {
    var that = {},
        modelContainerSelector = "#carModelContainer",
        yearContainerSelector = "#carYearContainer",
        productsContainerSelector = "#productsContainer",
        make = null,
        model = null,
        year = null;

    function isValidValue(str) {
	return !(str === null ||
		 str === undefined ||
		 str.indexOf('--') > -1);
    }

    function lookupModel(makeName) {
	if (!isValidValue(makeName)) {
	    return;
	}

    	var path = "model_lookup.php?make=" + makeName; 
    	$(modelContainerSelector).load(path);
    };

    function lookupYear(makeName, modelName) {
	var path = "year_lookup.php?make=" + makeName +
	    "&model=" + modelName;
	$(yearContainerSelector).load(path);
    }

    function lookupProducts(args) {
	var make = args.make;
	var model = args.model;
	var year = args.year;
	var path = "products_lookup.php?make=" + make +
	    "&model=" + model +
	    "&year=" + year;
	$(productsContainerSelector).load(path);
    }

    function init() {
	var container =	$("#carSelectContainer");
	container.on("change", "#carMakeSelect", function() {
    	    make = $(this).val();
    	    lookupModel(make);
    	});
	container.on("change", "#carModelSelect", function(){
	    model = $(this).val();
	    lookupYear(make, model);
	});
	container.on("change", "#carYearSelect", function() {
	    year = $(this).val();
	    lookupProducts({
		make: make,
		model: model,
		year: year
	    });
	});
    }

    that.isValidValue = isValidValue;
    that.LookupModel = lookupModel;
    that.LookupYear = lookupYear;
    that.LookupProducts = lookupProducts;
    
    init();

    return that;
};

$(document).ready(function(){
    TRSLookup = TRSLookupModule();
});
