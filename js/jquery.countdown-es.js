/* http://keith-wood.name/countdown.html
 * Spanish initialisation for the jQuery countdown extension
 * Written by Sergio Carracedo Martinez webmaster@neodisenoweb.com (2008) */
(function($) {
	$.countdown.regionalOptions['es'] = {
		labels: ['Yr', 'Mo', 'Wk', 'Dy', 'Hr', ':Min', ':Sec'],
		//labels: ['Años', 'Meses', 'Semanas', 'Días', 'Horas', 'Minutos', 'Segundos'],
		labels1: ['Yr', 'Mo', 'Wk', 'Dy', 'Hr', ':Min', ':Sec'],
		//labels1: ['Año', 'Mes', 'Semana', 'Día', 'Hora', 'Minuto', 'Segundo'],
		compactLabels: ['Yr', 'Mo', 'Wk', 'Dy', 'Hr', ':Min', ':Sec'],
		whichLabels: null,
		digits: ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'],
		timeSeparator: ':', isRTL: false};
	$.countdown.setDefaults($.countdown.regionalOptions['es']);
	//$.countdown.setDefaults();
})(jQuery);
