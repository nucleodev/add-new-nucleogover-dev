(() => {
    const el = window.wp.element.createElement;
    const { registerBlockType } = window.wp.blocks;
    const { RichText } = window.wp.blockEditor;

    registerBlockType('nucleogov/news', {
        title: 'Noticias',
        icon: 'welcome-write-blog',
        category: 'layout',
        attributes: {
            content: {
                type: 'array',
                source: 'children',
                selector: 'p',
            },
        },
        edit: myEdit,
        save: mySave
    });

    // what's rendered in admin
    function myEdit(props) {
        const atts = props.attributes;

        return el(RichText, {
            tagName: 'p',
            className: props.className,
            value: atts.content,

            // Listener when the RichText is changed.
            onChange: (value) => {
                props.setAttributes({ content: value });
            },
        });
    }

    // what's saved in database and rendered in frontend
    function mySave(props) {
        const atts = props.attributes;

        return el(RichText.Content, {
            tagName: 'p',
            value: atts.content,
        });
    }
})();

