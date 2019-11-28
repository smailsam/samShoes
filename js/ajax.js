// $('#monForm').submit(function(event){
// 	// stop l' action de l'"event" (ici le submit) 
// 	event.preventDefault();
// 	// récupération de la valeur de l' attribut "action" du form
// 	let formAction = $(this).attr('action');
// 	// récupération de la valeur de l' attribut "method" du form
// 	let formMethod = $(this).attr('method');
// 	// récupération des données et conversion en json via serialize
// 	let formData = $(this).serialize();

// 	// execution de l' ajax
// $.ajax({
// 	// affectation de l' url, du type et des données 
// 		url : formAction,
// 		type : formMethod,
// 		data : formData
// 	// quand l'execution est finit, execute une fonction annonyme
// 	// avec réponse (echo du fichier de traitement) en argument
// 	}).done(function(reponse){
// 		// insère la réponse dans la div d' id message
// $('#maPhoto').html(reponse);
// 	});
// });
