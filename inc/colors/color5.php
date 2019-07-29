<?php
    // BASE SETTINGS
    $scheme[ 'bodyBackground' ]                  = '#fff';
    $scheme[ 'textColor' ]                       = '#444';
    $scheme[ 'headingsColor' ]                   = '#333';
    $scheme[ 'headingsColorHighlight' ]          = '#333';
    $scheme[ 'linkColor' ]                       = '#3B83BA';
    $scheme[ 'linkColorHover' ]                  = $this->adjustBrightness( $scheme[ 'linkColor' ], -20 );
    $scheme[ 'headingsBorder' ]                  = '1px solid #eee';
    $scheme[ 'headingsShadow' ]                  = 'none';

    // FONTS
    $scheme[ 'primaryFontFamily' ]          = '"Roboto Condensed", "Helvetica Neue", Helvetica, Arial, sans-serif';
    $scheme[ 'secondaryFontFamily' ]        = '"Oswald", "Helvetica Neue", Helvetica, Arial, sans-serif';
    $scheme[ 'headingsFontWeight' ]         = '400';
    $scheme[ 'baseFontSize' ]               = '16px';
    $scheme[ 'baseLineHeight' ]             = '24px';
    $scheme[ 'baseFontWeight' ]             = '300';
    // NAVIGTION FONTS
    $scheme[ 'navigationFontFamily' ]       = $scheme[ 'secondaryFontFamily' ];
    $scheme[ 'navigationFontWeight' ]       = '300';
    $scheme[ 'navigationFontSize' ]         = '18px';
    // BUTTONS FONTS
    $scheme[ 'btnFontFamily' ]              = $scheme[ 'secondaryFontFamily' ];
    $scheme[ 'btnFontWeight' ]              = '300';
    // FONT WEIGHTS
    $scheme[ 'primaryFontWeightBold' ]      = '700';
    $scheme[ 'primaryFontWeightNormal' ]    = '400';
    $scheme[ 'primaryFontWeightThin' ]      = '300';
    $scheme[ 'secondaryFontWeightBold' ]    = '700';
    $scheme[ 'secondaryFontWeightNormal' ]  = '400';
    $scheme[ 'secondaryFontWeightThin' ]    = '300';



    // BOX WRAPPER
    $scheme[ 'boxWrapperBackground' ]            = '#fff';
    $scheme[ 'boxWrapperTextColor' ]             = '#4f4e4c';
    $scheme[ 'boxWrapperHeadingsColor' ]         = '#4f4e4c';
    $scheme[ 'boxWrapperShadow' ]                = 'inset 0px 1px 2px ' . $this->adjustBrightness( $scheme[ 'boxWrapperBackground' ], 10 ) . ', 0px 2px 10px 0px rgba(0,0,0,0.15)';
    $scheme[ 'boxWrapperRadius' ]                = '10px';
    $scheme[ 'boxWrapperPadding' ]               = '25px';
    $scheme[ 'boxWrapperBorder' ]                = '1px solid '.$this->adjustBrightness( $scheme[ 'bodyBackground' ], -30);

    // NAVBAR (TOP BAR)
    $scheme[ 'bodyTopPadding' ]                  = (get_field('top_bar_fixed_to_top', 'option') == 'yes') ? '78px' : '0px';
    $scheme[ 'navbarBackground' ]                = '#1B7DC4'; //596a72
    $scheme[ 'navbarBackgroundHighlight' ]       = '#1B7DC4';
    $scheme[ 'navbarBackgroundImage' ]           = 'none';
    $scheme[ 'navbarText' ]                      = '#fff';
    $scheme[ 'navbarLinkColor' ]                 = '#fff';
    $scheme[ 'navbarShadow' ]                    = 'none';
    $scheme[ 'navbarTopBorder' ]                 = '4px solid #1B7DC4';
    $scheme[ 'navbarBottomBorder' ]              = '4px solid #1B7DC4';
    $scheme[ 'navbarSearchColor' ]               = '#76B1DB';
    $scheme[ 'navbarSearchRadius' ]              = '0px';

    $scheme[ 'navbarLinkColorHover' ]            = $this->adjustBrightness( $scheme[ 'navbarLinkColor' ], 30 );
    $scheme[ 'navbarLinkColorActive' ]           = $this->adjustBrightness( $scheme[ 'navbarLinkColor' ], 30 );
    $scheme[ 'navbarLinkBackgroundHover' ]       = 'transparent';
    $scheme[ 'navbarLinkBackgroundActive' ]      = $this->adjustBrightness( $scheme[ 'navbarBackground' ], -20 );
    $scheme[ 'navbarLinkBackground' ]            = 'transparent';
    $scheme[ 'navbarActiveRadius' ]              = '18px';
    $scheme[ 'navbarActiveShadow' ]              = 'inset 0 2px 4px rgba(0,0,0,.3)';
    $scheme[ 'navbarActiveBorderBottom' ]        = 'none';
    $scheme[ 'navbarFontSize' ]                  = 'none';
    // Navbar button collapse
    $scheme[ 'navbarCollapseButtonColor' ]       = $this->adjustBrightness( $scheme[ 'navbarBackground' ], -30 );
    $scheme[ 'navbarCollapseButtonBackground' ]  = $this->adjustBrightness( $scheme[ 'navbarBackground' ], -10 );

    // Navbar dropdowns
    $scheme[ 'dropdownRadius' ]                  = '0px';
    $scheme[ 'dropdownBorder' ]                  = 'rgba(0,0,0,.2)';
    $scheme[ 'dropdownBackground' ]              = '#fff';
    $scheme[ 'dropdownLinkColor' ]               = '#3A5363';
    $scheme[ 'dropdownLinkColorHover' ]          = '#fff';
    $scheme[ 'dropdownLinkColorActive' ]         = '#fff';

    $scheme[ 'dropdownLinkBackgroundActive' ]    = '#3A5363';
    $scheme[ 'dropdownLinkBackgroundHover' ]     = '#3A5363';

    // Inverted navbar
    $scheme[ 'navbarInverseBackground' ]                = $scheme[ 'bodyBackground' ];
    $scheme[ 'navbarInverseBackgroundHighlight' ]       = $scheme[ 'bodyBackground' ];
    $scheme[ 'navbarInverseBorder' ]                    = $scheme[ 'bodyBackground' ];
    $scheme[ 'navbarInverseBorderHighlight' ]           = $scheme[ 'bodyBackground' ];

    $scheme[ 'navbarInverseText' ]                      = $scheme[ 'textColor' ];
    $scheme[ 'navbarInverseLinkColor' ]                 = $scheme[ 'textColor' ];
    $scheme[ 'navbarInverseLinkColorHover' ]            = $scheme[ 'textColor' ];
    $scheme[ 'navbarInverseLinkColorActive' ]           = $scheme[ 'textColor' ];
    $scheme[ 'navbarInverseLinkBackgroundHover' ]       = 'transparent';
    $scheme[ 'navbarInverseLinkBackgroundActive' ]      = 'transparent';

    $scheme[ 'navbarInverseSearchColor' ]               = $this->getContrastYIQ( $scheme[ 'navbarInverseLinkColor' ], $this->adjustBrightness( $scheme[ 'navbarInverseBackground' ], 30 ),  $this->adjustBrightness( $scheme[ 'navbarInverseBackground' ], -30 ));

    // HIGHLIGHTED HEADER
    $scheme[ 'highlightedHeaderBackground' ]     = '#4387b0'; // #556270 // #76a3a0  // #7C9495  // #AFC1A8  // #51606c
    $scheme[ 'highlightedHeaderBackgroundImage' ]= 'url("'. CSS_IMAGES_PATH .'blurred/hero-bg.jpg")';
    $scheme[ 'highlightedHeaderHeadingColor' ]   = '#ffffff';
    $scheme[ 'highlightedHeaderSubHeadingColor' ]= '#BCE5E5';
    $scheme[ 'highlightedHeaderShadow' ]         = 'inset 0px -2px 5px 0px rgba(0,0,0,0.3), 0px 4px 1px 0px rgba(255,255,255,0.7)';
    $scheme[ 'highlightedHeaderTextShadow' ]     = '1px 1px 2px rgba(0,0,0,0.2)';

    // LEADER SECTION
    $scheme[ 'leaderBackground' ]                = '#fff';
    $scheme[ 'leaderBackgroundImage' ]           = 'none';
    $scheme[ 'leaderMainHeaderWeight' ]          = '700';
    $scheme[ 'leaderTextColor' ]                 = '#404b54';
    $scheme[ 'leaderSecondaryTextColor' ]        = '#587ca0';
    $scheme[ 'leaderHighlightColor' ]            = '#2980B9';
    $scheme[ 'leaderFilterTextShadow' ]          = '0px 1px 0px '.$this->getContrastYIQ( $scheme[ 'leaderBackground' ], "rgba(255,255,255,0.3)", "rgba(0,0,0,0.3)");
    $scheme[ 'leaderHeadingsBorder' ]            = '1px solid '. $this->adjustBrightness( $scheme[ 'leaderBackground' ], -20 );
    $scheme[ 'leaderHeadingsShadow' ]            = 'none';
    $scheme[ 'leaderTextShadow' ]                = 'none';

    // HIGHLIGHTED SECTION WITH ICONS
    $scheme[ 'accentBackground' ]                = '#fff';
    $scheme[ 'accentBackgroundHighlight' ]       = '#fff';
    $scheme[ 'accentIconsColor' ]                = '#6b92ba';
    $scheme[ 'accentHeadingColor' ]              = '#34495E';
    $scheme[ 'accentTextColor' ]                 = '#587ca0';
    $scheme[ 'accentIconsTextShadow' ]           = 'none';
    $scheme[ 'accentBorders' ]                   = '1px solid #34495e';
    $scheme[ 'accentShadow' ]                    = 'none';

    $scheme[ 'accentContentBorders' ]            = '2px solid '.$this->adjustBrightness( $scheme[ 'accentBackground' ], -15 );
    $scheme[ 'accentContentBordersShadow' ]      = '0px 2px 0px 0px '.$this->adjustBrightness( $scheme[ 'accentBackground' ], 10 );

    // CTA BLOCK
    $scheme[ 'standoutBackground' ]              = '#556270';
    $scheme[ 'standoutBackgroundImage' ]         = 'none';
    $scheme[ 'standoutTextColor' ]               = '#fff';
    $scheme[ 'standoutFilterTextShadow' ]        = '0px 1px 0px '.$this->getContrastYIQ( $scheme[ 'standoutBackground' ], "rgba(255,255,255,0.3)", "rgba(0,0,0,0.3)");
    $scheme[ 'standoutHeadingsBorder' ]          = '3px solid '. $this->adjustBrightness( $scheme[ 'standoutBackground' ], -10 );
    $scheme[ 'standoutHeadingsShadow' ]          = '0px 1px 0px ' . $this->adjustBrightness( $scheme[ 'standoutBackground' ], -40 ) . ', 0px 3px 0px 0px '. $this->adjustBrightness( $scheme[ 'standoutBackground' ], 20 );
    // ITEM BOX
    $scheme[ 'framedPostBackground' ]            = '#fff';
    $scheme[ 'framedPostBackgroundHighlight' ]   = '#fff';
    $scheme[ 'framedPostBackgroundHover' ]       = '#fff';
    $scheme[ 'framedPostBorder' ]                = 'none';
    $scheme[ 'framedPostRadius' ]                = '0px';
    $scheme[ 'framedPostPadding' ]               = '10px';
    $scheme[ 'framedPostHeadingColor' ]          = '#494642';
    $scheme[ 'framedPostTextColor' ]             = '#56534e';
    $scheme[ 'framedPostShadow' ]                = 'none';
    $scheme[ 'framedPostLinkColor' ]             = '#2980b9';
    $scheme[ 'framedPostTagBg' ]                 = '#efefef';
    $scheme[ 'framedPostTagTextColor' ]          = '#605f5a';
    $scheme[ 'framedPostTagRadius' ]             = 'none';
    // TESTIMONIALS
    $scheme[ 'testimonialBubbleBackground' ]     = '#fff';
    $scheme[ 'testimonialBubbleRadius' ]         = '0px';
    $scheme[ 'testimonialBubblePadding' ]        = '10px 15px 0px';
    $scheme[ 'testimonialHighlightColor' ]       = '#D9E8F7';
    $scheme[ 'testimonialHeadingColor' ]         = '#2e2c29';
    $scheme[ 'testimonialTextColor' ]            = '#494642';
    $scheme[ 'testimonialByColor' ]              = '#494642';
    $scheme[ 'testimonialBorderColor' ]          = '#fff';
    $scheme[ 'testimonialBubbleShadow' ]         = 'none';
    $scheme[ 'testimonialAuthorShadow' ]         = 'none';
    $scheme[ 'testimonialAuthorShadowFaded' ]    = 'none';
    // ACCORDION
    $scheme[ 'accordionContentBackground' ]      = '#fff';
    $scheme[ 'accordionContentColor' ]           = '#3d3b36';
    $scheme[ 'accordionHeaderBackground' ]       = '#fff';
    $scheme[ 'accordionHeaderColor' ]            = '#3d3b36';
    $scheme[ 'accordionHeaderBackgroundActive' ] = '#fff';
    $scheme[ 'accordionHeaderColorActive' ]      = '#3d3b36';
    $scheme[ 'accordionRadius' ]                 = '8px';
    $scheme[ 'accordionIconColor' ]              = '#556270';
    $scheme[ 'accordionIconColorActive' ]        = '#556270';
    $scheme[ 'accordionHeaderShadow' ]           = '0px 2px 10px 1px rgba(0,0,0,0.15), inset 2px 2px 3px 0px #fff';
    $scheme[ 'accordionShadow' ]                 = '0px 2px 10px 1px rgba(0,0,0,0.15)';

    // TABS
    $scheme[ 'tabsContentBackground' ]           = '#fff';
    $scheme[ 'tabsContentColor' ]                = '#3d3b36';
    $scheme[ 'tabsHeaderBackground' ]            = $this->adjustBrightness( $scheme[ 'bodyBackground' ], -10 );
    $scheme[ 'tabsHeaderColor' ]                 = '#78746a';
    $scheme[ 'tabsHeaderBackgroundActive' ]      = '#fff';
    $scheme[ 'tabsHeaderColorActive' ]           = '#3d3b36';
    $scheme[ 'tabsRadius' ]                      = '8px';
    $scheme[ 'tabsHeaderShadow' ]                = 'inset 0px -3px 0px 0px rgba(0,0,0,0.15)';
    $scheme[ 'tabsHeaderShadowActive' ]          = 'none';
    $scheme[ 'tabsContentShadow' ]               = '0px 2px 10px 1px rgba(0,0,0,0.15)';

    // TOURS
    $scheme[ 'tourBackground' ]                  = 'transparent';
    $scheme[ 'tourContentBackground' ]           = 'transparent';
    $scheme[ 'tourContentBackgroundHighlight' ]  = 'transparent';
    $scheme[ 'tourContentLeftBorder' ]           = '1px solid '.$this->adjustBrightness( $scheme[ 'bodyBackground' ], -35 );
    $scheme[ 'tourNavBorder' ]                   = '1px solid '.$this->adjustBrightness( $scheme[ 'bodyBackground' ], -25 );
    $scheme[ 'tourMenuColor' ]                   = '#397cb0';
    $scheme[ 'tourMenuActiveColor' ]             = '#3d3b36';
    $scheme[ 'tourColor' ]                       = '#3d3b36';
    $scheme[ 'tourIconColor' ]                   = '#3d3b36';
    $scheme[ 'tourRadius' ]                      = '8px';
    $scheme[ 'tourShadow' ]                      = 'none';
    $scheme[ 'tourContentShadow' ]               = 'none';

    // PRICING TABLE
    $scheme[ 'pricingPackageBackground' ]        = '#fff';
    $scheme[ 'pricingPackageHeadingColor' ]      = '#494642';
    $scheme[ 'pricingPackageTextColor' ]         = '#56534e';
    $scheme[ 'pricingPackagePeriodColor' ]       = '#b3d8cf';
    $scheme[ 'pricingPackageFeatureHighlight' ]  = '#eaf5f9';
    $scheme[ 'pricingPackageShadow' ]            = 'none';
    $scheme[ 'pricingPackageRadius' ]            = '0px';

    // BUTTONS
    $scheme[ 'btnBorderRadius' ]                 = '4px';
    $scheme[ 'btnBorderRadiusSmall' ]            = '4px';
    $scheme[ 'btnBorderRadiusLarge' ]            = '6px';
    $scheme[ 'btnBorderRadiusHuge' ]             = '8px';
    $scheme[ 'btnType' ]                         = 'abs_flat';
    // DEFAULT BUTTON
    $scheme[ 'btnBackground' ]                   = '#f0eee8';
    $scheme[ 'btnBackgroundHighlight' ]          = $this->adjustBrightness( $scheme[ 'btnBackground' ], -20 );
    $scheme[ 'btnColor' ]                        = '#555';
    // BUTTONS PRIMARY
    $scheme[ 'btnPrimaryColor' ]                 = '#fff';
    $scheme[ 'btnPrimaryBackground' ]            = '#7A7876';
    $scheme[ 'btnPrimaryBackgroundHighlight' ]   = $this->adjustBrightness( $scheme[ 'btnPrimaryBackground' ], -40 );
    // BUTTONS WARNING
    $scheme[ 'btnWarningColor' ]                 = '#595547';
    $scheme[ 'btnWarningBackground' ]            = '#f8ebac';
    $scheme[ 'btnWarningBackgroundHighlight' ]   = $this->adjustBrightness( $scheme[ 'btnWarningBackground' ], -40 );
    // BUTTONS DANGER
    $scheme[ 'btnDangerColor' ]                  = '#fff';
    $scheme[ 'btnDangerBackground' ]             = '#d35144';
    $scheme[ 'btnDangerBackgroundHighlight' ]    = $this->adjustBrightness( $scheme[ 'btnDangerBackground' ], -40 );
    // BUTTONS SUCCESS
    $scheme[ 'btnSuccessColor' ]                 = '#fff';
    $scheme[ 'btnSuccessBackground' ]            = '#829639';
    $scheme[ 'btnSuccessBackgroundHighlight' ]   = $this->adjustBrightness( $scheme[ 'btnSuccessBackground' ], -40 );
    // BUTTONS INFO
    $scheme[ 'btnInfoColor' ]                    = '#fff';
    $scheme[ 'btnInfoBackground' ]               = '#44b0d3';
    $scheme[ 'btnInfoBackgroundHighlight' ]      = $this->adjustBrightness( $scheme[ 'btnInfoBackground' ], -40 );
    // BUTTONS INVERSE
    $scheme[ 'btnInverseColor' ]                 = '#fff';
    $scheme[ 'btnInverseBackground' ]            = '#272d2f';
    $scheme[ 'btnInverseBackgroundHighlight' ]   = $this->adjustBrightness( $scheme[ 'btnInverseBackground' ], -40 );




    // -------------------------
    // POSTS
    // -------------------------


    $scheme[ 'postContentRadius' ]               = '0px';
    $scheme[ 'postContentPadding' ]              = '30px 50px';
    $scheme[ 'postContentBorder' ]               = '1px solid '.$this->adjustBrightness( $scheme[ 'bodyBackground' ], -50 );
    $scheme[ 'postContentBackground' ]           = '#f5f4ef';
    $scheme[ 'postContentBackgroundHighlight' ]  = '#f8f7f3';
    $scheme[ 'postContentShadow' ]               = '0px 1px 10px 0px '.$this->adjustBrightness( $scheme[ 'bodyBackground' ], -40 ).', inset 2px 2px 2px 0px '.$this->adjustBrightness( $scheme[ 'postContentBackgroundHighlight' ], 20 );
    $scheme[ 'postContentHeadingsColor' ]        = $scheme[ 'headingsColor' ];
    $scheme[ 'postContentTextColor' ]            = $scheme[ 'textColor' ];
    $scheme[ 'postContentLinksColor' ]           = $scheme[ 'linkColor' ];
    // POST META
    $scheme[ 'postMetaRadius' ]                  = '6px';
    $scheme[ 'postMetaPadding' ]                 = '10px';
    $scheme[ 'postMetaBackground' ]              = $this->adjustBrightness( $scheme[ 'postContentBackground' ], -3 );
    $scheme[ 'postMetaBackgroundHighlight' ]     = $scheme['postMetaBackground'];
    $scheme[ 'postMetaBorder' ]                  = '1px solid '.$this->adjustBrightness( $scheme[ 'postMetaBackground' ], -30 );
    $scheme[ 'postMetaBorderColors' ]            = $this->adjustBrightness( $scheme[ 'postMetaBackground' ], -60 ).' '.$this->adjustBrightness( $scheme[ 'postMetaBackground' ], -20 ).' '.$this->adjustBrightness( $scheme[ 'postMetaBackground' ], -20 ).' '.$this->adjustBrightness( $scheme[ 'postMetaBackground' ], -20 );
    $scheme[ 'postMetaShadow' ]                  = '1px 1px 2px 0px '.$this->adjustBrightness( $scheme[ 'postContentBackgroundHighlight' ], 20 ).', inset 0px 1px 2px 0px '.$this->adjustBrightness( $scheme[ 'postMetaBackgroundHighlight' ], -20 );
    // POST ENTRY TAG
    $scheme[ 'postEntryTagColor' ]               = '#fff';
    $scheme[ 'postEntryTagBackground' ]          = '#2DB7AC';
    $scheme[ 'postEntryTagBorder' ]              = '1px solid '.$this->adjustBrightness( $scheme[ 'postEntryTagBackground' ], -30 );
    $scheme[ 'postEntryTagShadow' ]              = '0px 2px 2px '.$this->adjustBrightness( $scheme[ 'postMetaBackground' ], -20 ).', inset 0px 1px 0px 0px '.$this->adjustBrightness( $scheme[ 'postEntryTagBackground' ], 30 );
    $scheme[ 'postEntryTagRadius' ]              = '5px';
    $scheme[ 'postEntryTagTextShadow' ]          = $this->getContrastYIQ( $scheme[ 'postEntryTagColor' ], '1px 1px 0px '.$this->adjustBrightness($scheme[ 'postEntryTagBackground' ], 20), '-1px -1px 0px '.$this->adjustBrightness($scheme[ 'postEntryTagBackground' ], -20));
    // POST COMMENT FORM
    $scheme[ 'postCommentFormRadius' ]               = '0px';
    $scheme[ 'postCommentFormPadding' ]              = '30px 50px';
    $scheme[ 'postCommentFormBorder' ]               = '1px solid '.$this->adjustBrightness( $scheme[ 'bodyBackground' ], -50 );
    $scheme[ 'postCommentFormBackground' ]           = '#f5f4ef';
    $scheme[ 'postCommentFormBackgroundHighlight' ]  = '#f8f7f3';
    $scheme[ 'postCommentFormShadow' ]               = '0px 1px 10px 0px '.$this->adjustBrightness( $scheme[ 'bodyBackground' ], -40 ).', inset 2px 2px 2px 0px '.$this->adjustBrightness( $scheme[ 'postCommentFormBackgroundHighlight' ], 20 );
    $scheme[ 'postCommentFormHeadingsColor' ]        = $scheme[ 'headingsColor' ];
    $scheme[ 'postCommentFormTextColor' ]            = $scheme[ 'textColor' ];
    $scheme[ 'postCommentFormLinksColor' ]           = $scheme[ 'linkColor' ];
    // POST COMMENT LIST
    $scheme[ 'postCommentListBackground' ]           = '#f7f7f3';
    $scheme[ 'postCommentListColor' ]                = $scheme[ 'textColor' ];
    $scheme[ 'postCommentListRadius' ]               = '5px';
    $scheme[ 'postCommentListBorder' ]               = '1px solid '.$this->adjustBrightness( $scheme[ 'postCommentListBackground' ], -40 );
    $scheme[ 'postCommentListShadow' ]               = '1px 1px 4px 1px '.$this->adjustBrightness( $scheme[ 'bodyBackground' ], -10 ).', inset 0px 1px 1px 0px '.$this->adjustBrightness( $scheme[ 'postCommentListBackground' ], 30 );
    $scheme[ 'postCommentListAuthorBorder' ]         = '5px solid #fff';
    $scheme[ 'postCommentListAuthorShadow' ]         = '1px 1px 0px 0px '.$this->adjustBrightness( $scheme[ 'postCommentListBackground' ], -40 );
    $scheme[ 'postCommentListAuthorRadius' ]         = '50%';


    // -------------------------
    // BLOG SIDEBAR
    // -------------------------

    $scheme[ 'sidebarTitleColor' ]                   = '#7b7972';

    // TAGS WIDGET
    $scheme[ 'sidebarTagBackground' ]                = '#df9c88';
    $scheme[ 'sidebarTagColor' ]                     = '#fff';
    $scheme[ 'sidebarTagShadow' ]                    = 'inset -1px -1px 0px 0px '.$this->adjustBrightness( $scheme[ 'sidebarTagBackground' ], -40 );
    $scheme[ 'sidebarTagRadius' ]                    = '0px';
    $scheme[ 'sidebarTagTextShadow' ]                = $this->getContrastYIQ( $scheme[ 'sidebarTagColor' ], '1px 1px 0px '.$this->adjustBrightness($scheme[ 'sidebarTagBackground' ], -30), 'none');
    // TEXT BLOG WIDGET
    $scheme[ 'sidebarTextWidgetRadius' ]             = '0px';
    $scheme[ 'sidebarTextWidgetPadding' ]            = '20px';
    $scheme[ 'sidebarTextWidgetBorder' ]             = 'none';
    $scheme[ 'sidebarTextWidgetBackground' ]         = '#fffde3';
    $scheme[ 'sidebarTextWidgetShadow' ]             = '1px 1px 2px '.$this->adjustBrightness( $scheme[ 'bodyBackground' ], -30 );
    $scheme[ 'sidebarTextWidgetHeadingsColor' ]      = '#7c796b';
    $scheme[ 'sidebarTextWidgetTextColor' ]          = $scheme[ 'textColor' ];
    $scheme[ 'sidebarTextWidgetLinksColor' ]         = $scheme[ 'linkColor' ];
    // SEARCH WIDGET
    $scheme[ 'sidebarWidgetSearchBackground' ]       = $this->adjustBrightness( $scheme[ 'bodyBackground' ], -7 );
    $scheme[ 'sidebarWidgetSearchBorder' ]           = '1px solid '.$this->my_mix( '#333', $this->adjustBrightness( $scheme[ 'bodyBackground' ], -40 ), 10);
    $scheme[ 'sidebarWidgetSearchBorderColors' ]     = $this->my_mix( '#333', $this->adjustBrightness( $scheme[ 'bodyBackground' ], -60 ), 10).' '.$this->my_mix( '#333', $this->adjustBrightness( $scheme[ 'bodyBackground' ], -40 ), 10).' '.$this->my_mix( '#333', $this->adjustBrightness( $scheme[ 'bodyBackground' ], -40 ), 10).' '.$this->my_mix( '#333', $this->adjustBrightness( $scheme[ 'bodyBackground' ], -40 ), 10);
    $scheme[ 'sidebarWidgetSearchBorderRadius' ]     = '4px';
    $scheme[ 'sidebarWidgetSearchShadow' ]           = 'inset 0px 2px 3px 0px '.$this->my_mix( '#333', $this->adjustBrightness( $scheme[ 'bodyBackground' ], -15 ), 10).', 0px 1px 2px 0px '.$this->adjustBrightness( $scheme[ 'bodyBackground' ], 30 );
    $scheme[ 'sidebarWidgetSearchBorderHover' ]      = '1px solid '.$this->my_mix( '#333', $this->adjustBrightness( $scheme[ 'bodyBackground' ], -80 ), 10);
    $scheme[ 'sidebarWidgetSearchIconColor' ]        = $this->my_mix( '#333', $this->adjustBrightness( $scheme[ 'bodyBackground' ], -40 ), 10);
    // CATEGORIES
    $scheme[ 'sidebarCategoriesColor' ]              = $this->adjustBrightness( $scheme[ 'sidebarTitleColor' ], 20 );
    $scheme[ 'sidebarCategoriesBackground' ]         = $this->adjustBrightness( $scheme[ 'bodyBackground' ], 10 );
    $scheme[ 'sidebarCategoriesBackgroundHover' ]    = $this->adjustBrightness( $scheme[ 'bodyBackground' ], 50 );
    $scheme[ 'sidebarCategoriesHighlight' ]          = $this->adjustBrightness( $scheme[ 'bodyBackground' ], 20 );
    $scheme[ 'sidebarCategoriesHighlightHover' ]     = '#394a72';
    $scheme[ 'sidebarCategoriesShadow' ]             = '1px 1px 2px rgba(0,0,0,0.07)';



    // -------------------------
    // FORMS
    // -------------------------

    // INPUTS
    $scheme[ 'inputBackground' ]                 = '#fff';
    $scheme[ 'inputBorder' ]                     = $this->my_mix( '#333', $this->adjustBrightness( $scheme[ 'bodyBackground' ], -70 ), 10);
    $scheme[ 'inputBorderRadius' ]               = '4px';
    $scheme[ 'inputBoxShadow' ]                  = 'inset 1px 1px 1px 0px '.$this->adjustBrightness( $scheme[ 'inputBorder' ], 60 ).', 0px 1px 1px 0px '.$this->adjustBrightness( $scheme[ 'bodyBackground' ], 30 );
    // FORM WRAPPED
    $scheme[ 'formWrappedBackground' ]           = '#e5eaee';
    $scheme[ 'formWrappedBackgroundHighlight' ]  = $this->adjustBrightness( $scheme[ 'formWrappedBackground' ], 10);
    $scheme[ 'formWrappedColor' ]                = '#51585e';
    $scheme[ 'formWrappedBorder' ]               = '1px solid '.$this->adjustBrightness( $scheme[ 'formWrappedBackground' ], -50);
    $scheme[ 'formWrappedShadow' ]               = '0px 2px 12px 0px rgba(0,0,0,0.2), inset 2px 2px 3px 0px '.$this->adjustBrightness( $scheme[ 'formWrappedBackgroundHighlight' ], 15);
    $scheme[ 'formWrappedRadius' ]               = '10px';
    // FORM WRAPPED / INPUTS
    $scheme[ 'formWrappedInputBackground' ]      = $this->adjustBrightness( $scheme[ 'formWrappedBackground' ], -5);
    $scheme[ 'formWrappedInputBorder' ]          = $this->my_mix( '#333', $this->adjustBrightness( $scheme[ 'formWrappedBackground' ], -70 ), 10);
    $scheme[ 'formWrappedInputBoxShadow' ]       = 'inset 0px 2px 3px 0px '.$this->adjustBrightness( $scheme[ 'formWrappedInputBorder' ], 40 ).', 0px 1px 2px 0px '.$this->adjustBrightness( $scheme[ 'formWrappedBackgroundHighlight' ], 50 );

    // FORM STATES AND ALERTS
    // ----------------------

    // WARNING
    $scheme[ 'warningText' ]                     = '#5f5c50';
    $scheme[ 'warningBackground' ]               = '#fffde3';
    $scheme[ 'warningBorder' ]                   = $this->adjustBrightness( $scheme[ 'warningBackground' ], -30);
    // ERROR
    $scheme[ 'errorText' ]                       = '#fff';
    $scheme[ 'errorBackground' ]                 = '#CE4240';
    $scheme[ 'errorBorder' ]                     = $this->adjustBrightness( $scheme[ 'errorBackground' ], -30);
    // SUCCESS
    $scheme[ 'successText' ]                     = '#468847';
    $scheme[ 'successBackground' ]               = '#dff0d8';
    $scheme[ 'successBorder' ]                   = $this->adjustBrightness( $scheme[ 'successBackground' ], -30);
    // INFO
    $scheme[ 'infoText' ]                        = '#3a87ad';
    $scheme[ 'infoBackground' ]                  = '#d9edf7';
    $scheme[ 'infoBorder' ]                      = $this->adjustBrightness( $scheme[ 'infoBackground' ], -30);
    // OTHER
    $scheme[ 'alertBorderRadius' ]               = "0px";
    $scheme[ 'blockquoteHighlight' ]             = '#556270';



    // ---------------------------------------------------------------------------
    // FRAMED ELEMENTS (BROWSER, PHONE, PICTURE, PLAIN, NO_FRAME)
    // ---------------------------------------------------------------------------


    // BROWSER FRAME
    $scheme[ 'browserBackground' ]               = '#fff';
    $scheme[ 'browserRadius' ]                   = '0px';
    $scheme[ 'browserUrlRadius' ]                = '0px';
    $scheme[ 'browserButtonsColor' ]             = '#B4B3B1';
    $scheme[ 'browserUrlBackground' ]            = '#fff';
    $scheme[ 'browserUrlColor' ]                 = '#3A3833';
    $scheme[ 'browserShadow' ]                   = 'none';
    $scheme[ 'browserUrlShadow' ]                = 'none';
    $scheme[ 'browserBorder' ]                   = '1px solid #aaa';
    $scheme[ 'browserContentShadow' ]            = 'none';
    $scheme[ 'browserButtonShadow' ]             = 'none';




    // -----------
    // PORTFOLIO
    // -----------


    $scheme[ 'portfolioPageTagColor' ]               = '#fff';
    $scheme[ 'portfolioPageTagBackground' ]          = '#df9c88';
    $scheme[ 'portfolioPageTagBorder' ]              = '1px solid '.$this->adjustBrightness( $scheme[ 'portfolioPageTagBackground' ], -40 );
    $scheme[ 'portfolioPageTagShadow' ]              = '0px 2px 4px '.$this->adjustBrightness( $scheme[ 'bodyBackground' ], -30 ).', inset 0px 1px 0px 0px '.$this->adjustBrightness( $scheme[ 'portfolioPageTagBackground' ], 30 );
    $scheme[ 'portfolioPageTagRadius' ]              = '3px';
    $scheme[ 'portfolioPageTagTextShadow' ]          = $this->getContrastYIQ( $scheme[ 'portfolioPageTagColor' ], '1px 1px 0px '.$this->adjustBrightness($scheme[ 'portfolioPageTagBackground' ], 20), '-1px -1px 0px '.$this->adjustBrightness($scheme[ 'portfolioPageTagBackground' ], -20));




    // -----------
    // FOOTER AND PRE-FOOTER
    // -----------


    $scheme[ 'preFooterBackground' ]                 = '#68B3AF';
    $scheme[ 'preFooterBackgroundImage' ]            = 'url("'. CSS_IMAGES_PATH .'blurred/triangles.png")';
    $scheme[ 'preFooterColor' ]                      = '#e5eeed';
    $scheme[ 'preFooterHeadingsColor' ]              = '#e5eeed';
    $scheme[ 'footerBackground' ]                    = '#556270';
    $scheme[ 'footerColor' ]                         = '#c1c8d0';
    $scheme[ 'footerBorder' ]                        = '2px solid '.$this->adjustBrightness( $scheme[ 'footerBackground' ], -20);
    $scheme[ 'preFooterBorder' ]                     = '10px solid '.$this->adjustBrightness( $scheme[ 'preFooterBackground' ], -20);

    // -----------
    // FOOTER WIDGETS
    // -----------
    $scheme[ 'footerTagColor' ]               = '#fff';
    $scheme[ 'footerTagBackground' ]          = '#478E8B';
    $scheme[ 'footerTagBorder' ]              = '1px solid '.$this->adjustBrightness( $scheme[ 'footerTagBackground' ], -30 );
    $scheme[ 'footerTagShadow' ]              = '0px 2px 2px '.$this->adjustBrightness( $scheme[ 'preFooterBackground' ], -20 ).', inset 0px 1px 0px 0px '.$this->adjustBrightness( $scheme[ 'footerTagBackground' ], 30 );
    $scheme[ 'footerTagRadius' ]              = '5px';
    $scheme[ 'footerTagTextShadow' ]          = $this->getContrastYIQ( $scheme[ 'footerTagColor' ], '1px 1px 0px '.$this->adjustBrightness($scheme[ 'footerTagBackground' ], 20), '-1px -1px 0px '.$this->adjustBrightness($scheme[ 'footerTagBackground' ], -20));




    // -----------
    // WOOCOMMERCE VARIABLES
    // -----------


    // -----------
    // BREDCRUMBS
    // -----------

    // BREADCRUMB BOX
    $scheme[ 'wooBreadcrumbBoxRadius' ]                     = '4px';
    $scheme[ 'wooBreadcrumbBoxPadding' ]                    = '8px';
    $scheme[ 'wooBreadcrumbBoxBackground' ]                 = $this->adjustBrightness( $scheme[ 'bodyBackground' ], -3 );
    $scheme[ 'wooBreadcrumbBoxBackgroundHighlight' ]        = $scheme['wooBreadcrumbBoxBackground'];
    $scheme[ 'wooBreadcrumbBoxBorder' ]                     = '1px solid '.$this->adjustBrightness( $scheme[ 'wooBreadcrumbBoxBackground' ], -30 );
    $scheme[ 'wooBreadcrumbBoxBorderColors' ]               = $this->adjustBrightness( $scheme[ 'wooBreadcrumbBoxBackground' ], -60 ).' '.$this->adjustBrightness( $scheme[ 'wooBreadcrumbBoxBackground' ], -30 ).' '.$this->adjustBrightness( $scheme[ 'wooBreadcrumbBoxBackground' ], -20 ).' '.$this->adjustBrightness( $scheme[ 'wooBreadcrumbBoxBackground' ], -40 );
    $scheme[ 'wooBreadcrumbBoxShadow' ]                     = '2px 2px 2px 0px '.$this->adjustBrightness( $scheme[ 'bodyBackground' ], 20 ).', inset 2px 2px 2px 0px '.$this->adjustBrightness( $scheme[ 'wooBreadcrumbBoxBackgroundHighlight' ], -20 );
    // BREADCRUMB TAG
    $scheme[ 'wooBreadcrumbTagColor' ]                      = '#39809a';
    $scheme[ 'wooBreadcrumbTagBackground' ]                 = '#fff';
    $scheme[ 'wooBreadcrumbTagBorder' ]                     = 'none';
    $scheme[ 'wooBreadcrumbTagShadow' ]                     = '0px 1px 2px 0px rgba(0, 0, 0, 0.3)';
    $scheme[ 'wooBreadcrumbTagRadius' ]                     = '2px';
    $scheme[ 'wooBreadcrumbTagTextShadow' ]                 = 'none';


    // -----------
    // PRODUCT LOOP
    // -----------

    $scheme[ 'wooLoopProductBackground' ]                   = '#f8f7f3';
    $scheme[ 'wooLoopProductBackgroundHighlight' ]          = '#f5f4ef';
    $scheme[ 'wooLoopProductBackgroundHover' ]              = '#fff';
    $scheme[ 'wooLoopProductPadding' ]                      = '15px';
    $scheme[ 'wooLoopProductShadow' ]                       = '0px 1px 10px 0px #c5c4bb, inset 2px 2px 2px 0px #fff';
    $scheme[ 'wooLoopProductShadowHover' ]                  = '0px 1px 15px 3px #c5c4bb, inset 2px 2px 2px 0px #fff';
    $scheme[ 'wooLoopProductRadius' ]                       = 'none';
    $scheme[ 'wooLoopProductBorder' ]                       = '1px solid #bbbab1';
    $scheme[ 'wooLoopProductTextColor' ]                    = '@textColor';
    $scheme[ 'wooLoopProductRatingColor' ]                  = '#107fb0';
    // PRODUCT META
    $scheme[ 'wooLoopProductMetaRadius' ]                   = '4px';
    $scheme[ 'wooLoopProductMetaPadding' ]                  = '10px';
    $scheme[ 'wooLoopProductMetaBackground' ]               = $this->adjustBrightness( $scheme[ 'wooLoopProductBackground' ], -3 );
    $scheme[ 'wooLoopProductMetaBackgroundHighlight' ]      = $scheme['wooLoopProductMetaBackground'];
    $scheme[ 'wooLoopProductMetaBorder' ]                   = '1px solid '.$this->adjustBrightness( $scheme[ 'wooLoopProductMetaBackground' ], -30 );
    $scheme[ 'wooLoopProductMetaBorderColors' ]             = $this->adjustBrightness( $scheme[ 'wooLoopProductMetaBackground' ], -60 ).' '.$this->adjustBrightness( $scheme[ 'wooLoopProductMetaBackground' ], -30 ).' '.$this->adjustBrightness( $scheme[ 'wooLoopProductMetaBackground' ], -20 ).' '.$this->adjustBrightness( $scheme[ 'wooLoopProductMetaBackground' ], -40 );
    $scheme[ 'wooLoopProductMetaShadow' ]                   = '2px 2px 2px 0px '.$this->adjustBrightness( $scheme[ 'wooLoopProductBackground' ], 20 ).', inset 2px 2px 2px 0px '.$this->adjustBrightness( $scheme[ 'wooLoopProductMetaBackgroundHighlight' ], -20 );
    // PRODUCT PRICE
    $scheme[ 'wooLoopProductPriceColor' ]                   = '#fff';
    $scheme[ 'wooLoopProductPriceMetaColor' ]               = '#fff';
    $scheme[ 'wooLoopProductPriceBackground' ]              = '#2DB7AC';
    $scheme[ 'wooLoopProductPriceBorder' ]                  = '1px solid '.$this->adjustBrightness( $scheme[ 'wooLoopProductPriceBackground' ], -30 );
    $scheme[ 'wooLoopProductPriceShadow' ]                  = '0px 2px 2px '.$this->adjustBrightness( $scheme[ 'wooLoopProductMetaBackground' ], -20 ).', inset 0px 1px 0px 0px '.$this->adjustBrightness( $scheme[ 'wooLoopProductPriceBackground' ], 30 );
    $scheme[ 'wooLoopProductPriceRadius' ]                  = '5px';
    $scheme[ 'wooLoopProductPriceTextShadow' ]              = $this->getContrastYIQ( $scheme[ 'wooLoopProductPriceColor' ], '-1px -1px 0px '.$this->adjustBrightness($scheme[ 'wooLoopProductPriceBackground' ], -20), '1px 1px 0px '.$this->adjustBrightness($scheme[ 'wooLoopProductPriceBackground' ], 20));

    // ------------
    // PRODUCT PAGE
    // ------------
    $scheme[ 'wooSingleProductPriceColor' ]                 = '#457754';
    $scheme[ 'wooSingleProductTitleBorder' ]                = '1px solid #D3D1CB';
    $scheme[ 'wooHeadersTitleBorder' ]                      = '1px solid #D3D1CB';

    // TABS ON PRODUCT PAGE
    $scheme[ 'wooSingleProductTabsBorder' ]                 = '#BFBDB5';
    $scheme[ 'wooSingleProductTabsBackground' ]             = $scheme[ 'bodyBackground' ];


    // -----------
    // SHOT PAGINATION
    // -----------

    $scheme[ 'wooLoopPaginationBackground' ]                = $this->adjustBrightness( $scheme[ 'bodyBackground' ], 20 );
    $scheme[ 'wooLoopPaginationBackgroundActive' ]          = $this->adjustBrightness( $scheme[ 'bodyBackground' ], -20 );
    $scheme[ 'wooLoopPaginationShadow' ]                    = '0px 1px 5px 0px rgba(0,0,0,0.2), inset 0px 1px 1px 0px #fff';
    $scheme[ 'wooLoopPaginationShadowActive' ]              = 'inset 1px 1px 2px 0px rgba(0,0,0,0.2), 1px 1px 2px 0px #fff';
    $scheme[ 'wooLoopPaginationRadius' ]                    = '5px';
    $scheme[ 'wooLoopPaginationBorder' ]                    = '1px solid transparent';
    $scheme[ 'wooLoopPaginationBorderColors' ]              = '#C4C3BA #C4C3BA #AAA9A2 #C4C3BA';
    $scheme[ 'wooLoopPaginationBorderColorsActive' ]        = '#8C8B85 #AAA9A2 #AAA9A2 #8C8B85';

    // -----------
    // SIDEBAR
    // -----------
    $scheme[ 'wooSidebarBackground' ]                       = $scheme[ 'bodyBackground' ];
    $scheme[ 'wooSidebarBackgroundHighlight' ]              = '#DBDAD9';
    $scheme[ 'wooSidebarRadius' ]                           = '0px';
    $scheme[ 'wooSidebarBorder' ]                           = '1px solid #9E998E';
    $scheme[ 'wooSidebarShadow' ]                           = 'inset 3px 0px 2px 0px rgba(0,0,0,0.1), -2px 0px 1px 0px #F7F7F4';
    $scheme[ 'wooSidebarPadding' ]                          = '20px 0px 20px 30px';
    $scheme[ 'wooSidebarMargin' ]                           = '0px 0px 0px';

    $scheme[ 'wooSidebarWidgetBorder' ]                     = '#DBDBD0';
    $scheme[ 'wooSidebarWidgetShadow' ]                     = '0px 1px 0px 0px #fff';
    $scheme[ 'wooSidebarWidgetTitleBorder' ]                = '3px solid rgba(0,0,0,0.02)';
    $scheme[ 'wooSidebarWidgetTitleShadow' ]                = '0px 1px 0px rgba(0,0,0,0.2), 0px 3px 0px 0px rgba(255,255,255,0.4)';

    // PRODUCT LIST WIDGET (CART OR OTHER WIDGETS)
    $scheme[ 'wooSidebarListBorder' ]                       = '#C4C4BA';
    $scheme[ 'wooSidebarListTextColor' ]                    = $scheme[ 'textColor' ];
    $scheme[ 'wooSidebarListPriceBackground' ]              = '#B2514C';
    $scheme[ 'wooSidebarListPriceColor' ]                   = '#fff';
    $scheme[ 'wooSidebarListImageBorder' ]                  = 'none';
    $scheme[ 'wooSidebarListImageShadow' ]                  = '0px 2px 7px 0px rgba(0,0,0,0.4)';
    $scheme[ 'wooSidebarListImageRadius' ]                  = '5px';
    $scheme[ 'wooSidebarListRatingColor' ]                  = '#878057';