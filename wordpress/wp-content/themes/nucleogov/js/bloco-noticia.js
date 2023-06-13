(function () {
    var el = wp.element.createElement;
    var registerBlockType = wp.blocks.registerBlockType;
    var ServerSideRender = wp.serverSideRender;
    var InspectorControls = wp.blockEditor.InspectorControls;
    var PanelBody = wp.components.PanelBody;
    var RangeControl = wp.components.RangeControl;

    registerBlockType('nucleogov/news', {
        title: 'Noticias',
        icon: 'list-view',
        category: 'common',
        attributes: {
            postsToShow: {
                type: 'number',
                default: 4,
            },
        },
        edit: function (props) {
            var postsToShow = props.attributes.postsToShow;
            var setAttributes = props.setAttributes;

            return [
                el(InspectorControls, { key: 'controls' },
                    el(PanelBody, { title: 'Configurações', initialOpen: true },
                        el(RangeControl, {
                            label: 'Posts para exibir',
                            value: postsToShow,
                            onChange: function (value) {
                                setAttributes({ postsToShow: value });
                            },
                            min: 1,
                            max: 10,
                            step: 1,
                        })
                    )
                ),
                el(ServerSideRender, {
                    key: 'server-side-render',
                    block: 'nucleogov/news',
                    attributes: props.attributes,
                }),
            ];
        },
        save: function () {
            // O bloco de renderização é tratado no lado do servidor, então não há nada a ser salvo aqui.
            return null;
        },
    });
})();
