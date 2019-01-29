import {
  Facebook,
  Twitter,
  Email,
  GooglePlus,
} from './Icons';

export const save = ({attributes}) => {
  const {
    url,
    text,
    facebookEnabled,
    twitterEnabled,
    googlePlusEnabled,
    emailEnabled,
  } = attributes;

  return (
    <div className={'wp-block-roots-sharebuttons'}>
      { facebookEnabled ? ( <Facebook url={ url } /> ) : ( null ) }
      { twitterEnabled ? ( <Twitter url={ url } text={ text } /> ) : ( null ) }
      { googlePlusEnabled ? ( <GooglePlus url={ url } /> ) : ( null ) }
      { emailEnabled ? ( <Email url={ url } text={ text } /> ) : ( null ) }
    </div>
  )
}