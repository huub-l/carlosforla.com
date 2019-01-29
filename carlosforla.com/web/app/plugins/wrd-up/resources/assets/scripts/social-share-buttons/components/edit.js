import {
  __,
  withSelect,
  Fragment,
  InspectorControls,
  PanelBody,
  PanelRow,
  ToggleControl,
} from './../../imports';

import PanelButtonSettings from './../../base/PanelButtonSettings';

import {
  Facebook,
  Twitter,
  Email,
  GooglePlus,
} from './Icons';

import { StyledShares } from './StyledShares';

/**
 * Todo:
 * - Finish __('translation')
 * - Rework with redux state
 * - Make buttons not clickable
 */

export const edit = withSelect((select) => {
  return {
    permalink: select('core/editor').getPermalink(),
    currentPost: select('core/editor').getCurrentPost(),
  };
})(({ permalink, currentPost, className, setAttributes, attributes }) => {
  const {
    facebookEnabled,
    twitterEnabled,
    emailEnabled,
    googlePlusEnabled,
    text,
    color,
    textColor,
    borderRadius,
    size,
  } = attributes;

  setAttributes({
    url: permalink,
    text: currentPost.excerpt,
  });

  return (<Fragment>
    <InspectorControls>
      <PanelButtonSettings
        color={color}
        textColor={textColor}
        borderRadius={borderRadius}
        size={size}
        onChangeColor={(color) => { setAttributes({ color })}}
        onChangeTextColor={(textColor) => { setAttributes({ textColor })}}
        onChangeBorderRadius={(borderRadius) => { setAttributes({ borderRadius })}}
        onChangeSize={(size) => { setAttributes({ size })}}
      />
      <PanelBody title={'Network Visibility'}>
        <PanelRow>
          <ToggleControl label={facebookEnabled ? 'Hide' : 'Show'} help={facebookEnabled ? __('Facebook displayed') : __('Facebook hidden')} checked={facebookEnabled} onChange={() => { setAttributes({ facebookEnabled: !facebookEnabled }); } } />
        </PanelRow>
        <PanelRow>
          <ToggleControl label={twitterEnabled ? 'Hide' : 'Show'} help={twitterEnabled ? 'Twitter displayed' : 'Twitter hidden'} checked={twitterEnabled} onChange={() => { setAttributes({ twitterEnabled: !twitterEnabled }); } } />
        </PanelRow>
        <PanelRow>
          <ToggleControl label={googlePlusEnabled ? 'Hide' : 'Show'} help={googlePlusEnabled ? 'Google Plus displayed' : 'Google Plus hidden'} checked={googlePlusEnabled} onChange={() => { setAttributes({ googlePlusEnabled: !googlePlusEnabled }); } } />
        </PanelRow>
        <PanelRow>
          <ToggleControl label={emailEnabled ? 'Hide' : 'Show'} help={emailEnabled ? 'Email displayed' : 'Email hidden'} checked={emailEnabled} onChange={() => { setAttributes({ emailEnabled: !emailEnabled }); } } />
        </PanelRow>
      </PanelBody>
    </InspectorControls>
    <StyledShares className={className}>
      {facebookEnabled ? (<Facebook url={''} color={color} textColor={textColor} borderRadius={borderRadius} size={size} />) : (null)}
      {twitterEnabled ? (<Twitter url={''} color={color} textColor={textColor} text={text} borderRadius={borderRadius} size={size} />) : (null)}
      {googlePlusEnabled ? (<GooglePlus url={''} textColor={textColor} color={color} borderRadius={borderRadius} size={size} />) : (null)}
      {emailEnabled ? (<Email url={''} color={color} textColor={textColor} text={text} borderRadius={borderRadius} size={size} />) : (null)}
    </StyledShares>
  </Fragment>);
});
