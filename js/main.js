const navBtn = document.querySelector('.nav_btn');
const modal = document.querySelector('.modal');
const modalItems = document.querySelectorAll('.modal li');
const element = navBtn.children;

navBtn.addEventListener('click', () => {
// SPのハンバーガーメニューの表示・非表示
	modal.classList.toggle('active');

//SPのハンバーガーメニューの変形
	for (const el of element) {
		el.classList.toggle('open');
	}
});

//SPハンバーガーメニューのリンクをクリックしたら
modalItems.forEach(item => {
	item.addEventListener('click', () => {
		//ナビを折りたたむ
    modal.classList.toggle('active');
    for (const el of element) {
			//ハンバーガーメニューを元に戻す
			el.classList.toggle('open');
    }
  });
});


