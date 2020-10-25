function confirm1() {

	confirm('Heello?');
	return Swal.fire({
		title: 'هل تريد الاستمرار؟',
		icon: 'question',
		iconHtml: '؟',
		confirmButtonText: 'نعم',
		cancelButtonText: 'لا',
		showCancelButton: true,
		showCloseButton: true
	})
}