import styled from 'styled-components';

export const StyledShares = styled.div`
  &.is-style-ghost {
    .resp-sharing-button__link .resp-sharing-button {
      background: transparent;
      border: 1px solid #333;
      color: #333;
      transition: background 0.2s ease-in-out;

      &:hover {
        color: #fff;
      }
    }

    .resp-sharing-buton__link .resp.sharing-button:hover {
      border: 1px solid #27ae60;
      transition: background 0.2s ease-in-out;
    }
  }

  && {

    .resp-sharing-button--small.is-small {
      font-size: 0.8rem;
    }

    .resp-sharing-button--large.is-large {
      font-size: 1.2rem;
    }

    .resp-sharing-button__link,
    .resp-sharing-button__icon {
      display: inline-block;
      transition: all 0.2s ease-in-out;
    }

    .resp-sharing-button__link {
      text-decoration: none;
      color: #fff;
      margin: 0.5em;
    }

    .resp-sharing-button {
      border-radius: 5px;
      transition: 25ms ease-out;
      padding: 0.5em 0.75em;
      font-family: Helvetica Neue,Helvetica,Arial,sans-serif;
    }

    .resp-sharing-button__icon svg {
      width: 1em;
      height: 1.8em;
      margin-right: 0.4em;
      vertical-align: top;
    }

    /* Non solid icons get a stroke */
    .resp-sharing-button__icon {
      stroke: #fff;
      fill: none;
    }

    /* Solid icons get a fill */
    .resp-sharing-button__icon--solid,
    .resp-sharing-button__icon--solidcircle {
      fill: #fff;
      stroke: none;
    }

    .resp-sharing-button--twitter {
      background-color: #55acee;
    }

    .resp-sharing-button--twitter:hover {
      background-color: #2795e9;
    }

    .resp-sharing-button--pinterest {
      background-color: #bd081c;
    }

    .resp-sharing-button--pinterest:hover {
      background-color: #8c0615;
    }

    .resp-sharing-button--facebook {
      background-color: #3b5998;
    }

    .resp-sharing-button--facebook:hover {
      background-color: #2d4373;
    }

    .resp-sharing-button--tumblr {
      background-color: #35465C;
    }

    .resp-sharing-button--tumblr:hover {
      background-color: #222d3c;
    }

    .resp-sharing-button--reddit {
      background-color: #5f99cf;
    }

    .resp-sharing-button--reddit:hover {
      background-color: #3a80c1;
    }

    .resp-sharing-button--google {
      background-color: #dd4b39;
    }

    .resp-sharing-button--google:hover {
      background-color: #c23321;
    }

    .resp-sharing-button--linkedin {
      background-color: #0077b5;
    }

    .resp-sharing-button--linkedin:hover {
      background-color: #046293;
    }

    .resp-sharing-button--email {
      background-color: #777;
    }

    .resp-sharing-button--email:hover {
      background-color: #5e5e5e;
    }

    .resp-sharing-button--xing {
      background-color: #1a7576;
    }

    .resp-sharing-button--xing:hover {
      background-color: #114c4c;
    }

    .resp-sharing-button--whatsapp {
      background-color: #25D366;
    }

    .resp-sharing-button--whatsapp:hover {
      background-color: #1da851;
    }

    .resp-sharing-button--hackernews {
      background-color: #FF6600;
    }

    .resp-sharing-button--hackernews:hover,
    .resp-sharing-button--hackernews:focus {
      background-color: #FB6200;
    }

    .resp-sharing-button--vk {
      background-color: #507299;
    }

    .resp-sharing-button--vk:hover {
      background-color: #43648c;
    }

    .resp-sharing-button--facebook {
      background-color: #3b5998;
      border-color: #3b5998;
    }

    .resp-sharing-button--facebook:hover,
    .resp-sharing-button--facebook:active {
      background-color: #2d4373;
      border-color: #2d4373;
    }

    .resp-sharing-button--twitter {
      background-color: #55acee;
      border-color: #55acee;
    }

    .resp-sharing-button--twitter:hover,
    .resp-sharing-button--twitter:active {
      background-color: #2795e9;
      border-color: #2795e9;
    }

    .resp-sharing-button--google {
      background-color: #dd4b39;
      border-color: #dd4b39;
    }

    .resp-sharing-button--google:hover,
    .resp-sharing-button--google:active {
      background-color: #c23321;
      border-color: #c23321;
    }

    .resp-sharing-button--tumblr {
      background-color: #35465C;
      border-color: #35465C;
    }

    .resp-sharing-button--tumblr:hover,
    .resp-sharing-button--tumblr:active {
      background-color: #222d3c;
      border-color: #222d3c;
    }

    .resp-sharing-button--email {
      background-color: #777;
      border-color: #777;
    }

    .resp-sharing-button--email:hover,
    .resp-sharing-button--email:active {
      background-color: #5e5e5e;
      border-color: #5e5e5e;
    }

    .resp-sharing-button--pinterest {
      background-color: #bd081c;
      border-color: #bd081c;
    }

    .resp-sharing-button--pinterest:hover,
    .resp-sharing-button--pinterest:active {
      background-color: #8c0615;
      border-color: #8c0615;
    }

    .resp-sharing-button--linkedin {
      background-color: #0077b5;
      border-color: #0077b5;
    }

    .resp-sharing-button--linkedin:hover,
    .resp-sharing-button--linkedin:active {
      background-color: #046293;
      border-color: #046293;
    }

    .resp-sharing-button--reddit {
      background-color: #5f99cf;
      border-color: #5f99cf;
    }

    .resp-sharing-button--reddit:hover,
    .resp-sharing-button--reddit:active {
      background-color: #3a80c1;
      border-color: #3a80c1;
    }

    .resp-sharing-button--xing {
      background-color: #1a7576;
      border-color: #1a7576;
    }

    .resp-sharing-button--xing:hover
    .resp-sharing-button--xing:active {
      background-color: #114C4C;
      border-color: #114C4C;
    }

    .resp-sharing-button--whatsapp {
      background-color: #25D366;
      border-color: #25D366;
    }

    .resp-sharing-button--whatsapp:hover,
    .resp-sharing-button--whatsapp:active {
      background-color: #1DA851;
      border-color: #1DA851;
    }

    .resp-sharing-button--hackernews {
      background-color: #FF6600;
      border-color: #FF6600;
    }

    .resp-sharing-button--hackernews:hover
    .resp-sharing-button--hackernews:active {
      background-color: #FB6200;
      border-color: #FB6200;
    }

    .resp-sharing-button--vk {
      background-color: #507299;
      border-color: #507299;
    }

    .resp-sharing-button--vk:hover
    .resp-sharing-button--vk:active {
      background-color: #43648c;
      border-color: #43648c;
    }

    .resp-sharing-button--telegram {
      background-color: #54A9EB;
    }

    .resp-sharing-button--telegram:hover {
      background-color: #4B97D1;
    }
  }
`