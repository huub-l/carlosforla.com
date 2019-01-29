import {
  __,
  registerBlockType,
} from './../imports'

import { edit } from './components/edit';
import { save } from './components/save';
import { ShareIcon } from './components/Icons';

const attributes = {
  facebookEnabled: {
    type: 'boolean',
    src: 'svg.facebook',
    default: 1,
  },
  twitterEnabled: {
    type: 'boolean',
    src: 'svg.twitter',
    default: 1,
  },
  googlePlusEnabled: {
    type: 'boolean',
    src: 'svg.google-plus',
  },
  emailEnabled: {
    type: 'boolean',
    src: 'svg.email',
  },
  url: {
    type: 'string',
  },
  text: {
    type: 'string',
  },
  color: {
    type: 'string',
  },
  textColor: {
    type: 'string',
  },
  borderRadius: {
    type: 'number',
  },
  size: {
    type: 'string',
    default: 'normal',
  },
}

const styles = [
  { name: 'standard', label: __('Standard'), isDefault: true },
  { name: 'ghost', label: __('Ghost'), isDefault: false },
];

registerBlockType('pixel/sharebuttons', {
  title: __('Social Share Buttons'),
  description: __('Lightweight social sharing buttons'),
  category: 'common',
  keywords: [__('Roots')],
  icon: {
    background: '#27ae60',
    foreground: '#fff',
    src: <ShareIcon width={48} height={48} />,
  },
  edit,
  save,
  attributes,
  styles,
});
