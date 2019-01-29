import {
  __,
  Fragment,
  PanelColorSettings,
  SelectControl,
  RangeControl,
} from './../imports';

export default function PanelButtonSettings( props ) {
  const {
    color,
    textColor,
    size,
    borderRadius,
    onChangeColor,
    onChangeTextColor,
    onChangeSize,
    onChangeBorderRadius,
  } = props;

  return (
    <Fragment>
      <PanelColorSettings
        initialOpen={ false }
        title={__('Button Settings')}
        colorSettings={
          [{
            value: color,
            onChange: onChangeColor,
            label: __('Button Color'),
          },
          {
            value: textColor,
            onChange: onChangeTextColor,
            label: __('Text Color'),
          }]
        }
      >
        <SelectControl
          label={__('Size')}
          value={size}
          options={[
            { value: 'small', label: __('Small') },
            { value: 'normal', label: __('Normal') },
            { value: 'large', label: __('Large') },
          ]}
          onChange={onChangeSize}
        />
        <RangeControl
          label={__('Border Radius')}
          value={borderRadius}
          min='1'
          max='50'
          onChange={onChangeBorderRadius}
        />
      </PanelColorSettings>
    </Fragment>
  );
}
