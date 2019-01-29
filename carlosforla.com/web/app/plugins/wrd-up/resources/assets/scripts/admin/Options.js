import {
  render
} from './../imports'

export const Output = () => {
  return (
    <div id="reactOutput">React!</div>
  )
}

const container = document.getElementById('wordUpAdminJS');
render(<Output />, container);
