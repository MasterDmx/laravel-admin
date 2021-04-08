// ----------------------------------------------------------------------------
// markItUp!
// ----------------------------------------------------------------------------
// Copyright (C) 2008 Jay Salvat
// http://markitup.jaysalvat.com/
// ----------------------------------------------------------------------------
myBbcodeSettings = {
	nameSpace:          "bbcode", // Useful to prevent multi-instances CSS conflict
	previewParserPath:  "~/sets/bbcode/preview.php",
	markupSet: [
		{name:'Параграф', key:'P', openWith:'[p] ', closeWith:' [/p]', className:"h-elem h-elem-paragraph"},
		{name:'Жирный', key:'B', openWith:'[b]', closeWith:'[/b]', className:"h-elem h-elem-bold"},
		{name:'Курсив', key:'I', openWith:'[i]', closeWith:'[/i]', className:"h-elem h-elem-italic"},
		{name:'Подчеркнутый', key:'U', openWith:'[u]', closeWith:'[/u]', className:"h-elem h-elem-underline"},
		{name:'Заголовки', key:'H', openWith:'[h2]', closeWith:'[/h2]', className:"h-elem h-elem-header", dropMenu :[
			{name:'H2', openWith:'[h2]', closeWith:'[/h2]' },
			{name:'H3', openWith:'[h3]', closeWith:'[/h3]' },
			{name:'H4', openWith:'[h4]', closeWith:'[/h4]' },
			{name:'H5', openWith:'[h5]', closeWith:'[/h5]' },
			{name:'H6', openWith:'[h6]', closeWith:'[/h6]' },
		]},
		{name:'Менеджер изображений', className:"h-elem h-elem-picture", beforeInsert:function(h) {
            window.app.showMediaManager({
                useCallback: function (file) {
                    let title = prompt('Title аттрибут', file.name);
                    let titleAttribute = '';

                    if (title !== '' && title !== undefined && title !== null ) {
                        titleAttribute = ' :title=' + title;
                    }

					$.markItUp({openWith: '[media.image' + titleAttribute + ']' + file.path + '[/media.image]'});
                }
            });
		}},
		{name:'Список', openWith:'[list]\n', closeWith:'\n[/list]', className:"h-elem h-elem-list"},
		{name:'Цифровой список', openWith:'[list=[![Стартовый номер]!]]\n', closeWith:'\n[/list]', className:"h-elem h-elem-list-num"},
		{name:'Элемент списка', openWith:'[*] ', className:"h-elem h-elem-list-item"},
		{name:'Ссылка', key:'H', openWith:'[url=[![Url]!]]', closeWith:'[/url]', placeHolder:'Анкор...', className:"h-elem h-elem-link", dropMenu :[
			{name:'Ссылка', openWith:'[url=[![Url]!]]', closeWith:'[/url]', placeHolder:'Анкор...', },
			{name:'В новой вкладке', openWith:'[url_blank=[![Url]!]]', closeWith:'[/url]', placeHolder:'Анкор...', },
			{name:'Вн. ссылка', openWith:'[url_out=[![Url]!]]', closeWith:'[/url]', placeHolder:'Анкор...', },
			{name:'Вн. target blank', openWith:'[url_out_blank=[![Url]!]]', closeWith:'[/url]', placeHolder:'Анкор...', },
		]},
		{name:'Таблица', key:'T', openWith:'[table][tr][td]', closeWith:'[/td][/tr][/table]', className:"h-elem h-elem-table", dropMenu :[
			{name:'table', openWith:'[table]', closeWith:'[/table]' },
			{name:'th', openWith:'[tr]', closeWith:'[/tr]' },
			{name:'th', openWith:'[th]', closeWith:'[/th]' },
			{name:'td', openWith:'[td]', closeWith:'[/td]' },
		]},
		{name:'Цитата', key:'q', openWith:'[quote]', closeWith:'[/quote]', className:"h-elem h-elem-quote"},
		{name:'Текст по левому краю', openWith:'[left]', closeWith:'[/left]', className:"h-elem h-elem-left"},
		{name:'Текст по центру', openWith:'[center]', closeWith:'[/center]', className:"h-elem h-elem-center"},
		{name:'Текст по правому краю', openWith:'[right]', closeWith:'[/right]', className:"h-elem h-elem-right"},
		{name:'Текст по ширине', openWith:'[justify]', closeWith:'[/justify]', className:"h-elem h-elem-justify"},
		{name:'Убрать форматирование', className:"h-elem h-elem-clean", replaceWith:function(h) { return h.selection.replace(/\[(.*?)\]/g, "") } },
	 ]
  }
