"use strict";(self.webpackChunkflone_react=self.webpackChunkflone_react||[]).push([[4026],{4026:function(e,s,a){a.r(s);var l=a(2791),i=a(7689),c=a(1087),r=a(9434),n=a(1770),t=a(3695),d=a(5378),o=(a(2484),a(184));s.default=function(){var e=0,s=((0,i.TH)().pathname,(0,r.v9)((function(e){return e.currency}))),a=(0,r.v9)((function(e){return e.cart})).cartItems;return(0,o.jsxs)(l.Fragment,{children:[(0,o.jsx)(t.Z,{titleTemplate:"Checkout",description:"Checkout page of flone react minimalist eCommerce template."}),(0,o.jsx)(d.Z,{headerTop:"visible",children:(0,o.jsx)("div",{className:"checkout-area pt-95 pb-100",children:(0,o.jsx)("div",{className:"container",children:a&&a.length>=1?(0,o.jsxs)("div",{className:"row",children:[(0,o.jsx)("div",{className:"col-lg-7",children:(0,o.jsxs)("div",{className:"billing-info-wrap",children:[(0,o.jsx)("h3",{children:"Billing Details"}),(0,o.jsxs)("div",{className:"row",children:[(0,o.jsx)("div",{className:"col-lg-6 col-md-6",children:(0,o.jsxs)("div",{className:"billing-info mb-20",children:[(0,o.jsx)("label",{children:"First Name"}),(0,o.jsx)("input",{type:"text"})]})}),(0,o.jsx)("div",{className:"col-lg-6 col-md-6",children:(0,o.jsxs)("div",{className:"billing-info mb-20",children:[(0,o.jsx)("label",{children:"Last Name"}),(0,o.jsx)("input",{type:"text"})]})}),(0,o.jsx)("div",{className:"col-lg-12",children:(0,o.jsxs)("div",{className:"billing-info mb-20",children:[(0,o.jsx)("label",{children:"Company Name"}),(0,o.jsx)("input",{type:"text"})]})}),(0,o.jsx)("div",{className:"col-lg-12",children:(0,o.jsxs)("div",{className:"billing-select mb-20",children:[(0,o.jsx)("label",{children:"Country"}),(0,o.jsxs)("select",{children:[(0,o.jsx)("option",{children:"Select a country"}),(0,o.jsx)("option",{children:"Azerbaijan"}),(0,o.jsx)("option",{children:"Bahamas"}),(0,o.jsx)("option",{children:"Bahrain"}),(0,o.jsx)("option",{children:"Bangladesh"}),(0,o.jsx)("option",{children:"Barbados"})]})]})}),(0,o.jsx)("div",{className:"col-lg-12",children:(0,o.jsxs)("div",{className:"billing-info mb-20",children:[(0,o.jsx)("label",{children:"Street Address"}),(0,o.jsx)("input",{className:"billing-address",placeholder:"House number and street name",type:"text"}),(0,o.jsx)("input",{placeholder:"Apartment, suite, unit etc.",type:"text"})]})}),(0,o.jsx)("div",{className:"col-lg-12",children:(0,o.jsxs)("div",{className:"billing-info mb-20",children:[(0,o.jsx)("label",{children:"Town / City"}),(0,o.jsx)("input",{type:"text"})]})}),(0,o.jsx)("div",{className:"col-lg-6 col-md-6",children:(0,o.jsxs)("div",{className:"billing-info mb-20",children:[(0,o.jsx)("label",{children:"State / County"}),(0,o.jsx)("input",{type:"text"})]})}),(0,o.jsx)("div",{className:"col-lg-6 col-md-6",children:(0,o.jsxs)("div",{className:"billing-info mb-20",children:[(0,o.jsx)("label",{children:"Postcode / ZIP"}),(0,o.jsx)("input",{type:"text"})]})}),(0,o.jsx)("div",{className:"col-lg-6 col-md-6",children:(0,o.jsxs)("div",{className:"billing-info mb-20",children:[(0,o.jsx)("label",{children:"Phone"}),(0,o.jsx)("input",{type:"text"})]})}),(0,o.jsx)("div",{className:"col-lg-6 col-md-6",children:(0,o.jsxs)("div",{className:"billing-info mb-20",children:[(0,o.jsx)("label",{children:"Email Address"}),(0,o.jsx)("input",{type:"text"})]})})]}),(0,o.jsxs)("div",{className:"additional-info-wrap",children:[(0,o.jsx)("h4",{children:"Additional information"}),(0,o.jsxs)("div",{className:"additional-info",children:[(0,o.jsx)("label",{children:"Order notes"}),(0,o.jsx)("textarea",{placeholder:"Notes about your order, e.g. special notes for delivery. ",name:"message",defaultValue:""})]})]})]})}),(0,o.jsx)("div",{className:"col-lg-5",children:(0,o.jsxs)("div",{className:"your-order-area",children:[(0,o.jsx)("h3",{children:"Your order"}),(0,o.jsxs)("div",{className:"your-order-wrap gray-bg-4",children:[(0,o.jsxs)("div",{className:"your-order-product-info",children:[(0,o.jsx)("div",{className:"your-order-top",children:(0,o.jsxs)("ul",{children:[(0,o.jsx)("li",{children:"Product"}),(0,o.jsx)("li",{children:"Total"})]})}),(0,o.jsx)("div",{className:"your-order-middle",children:(0,o.jsx)("ul",{children:a.map((function(a,l){var i=(0,n.lk)(a.price,a.discount),c=(a.price*s.currencyRate).toFixed(2),r=(i*s.currencyRate).toFixed(2);return e+=null!=i?r*a.quantity:c*a.quantity,(0,o.jsxs)("li",{children:[(0,o.jsxs)("span",{className:"order-middle-left",children:[a.name," X ",a.quantity]})," ",(0,o.jsx)("span",{className:"order-price",children:null!==i?s.currencySymbol+(r*a.quantity).toFixed(2):s.currencySymbol+(c*a.quantity).toFixed(2)})]},l)}))})}),(0,o.jsx)("div",{className:"your-order-bottom",children:(0,o.jsxs)("ul",{children:[(0,o.jsx)("li",{className:"your-order-shipping",children:"Shipping"}),(0,o.jsx)("li",{children:"Free shipping"})]})}),(0,o.jsx)("div",{className:"your-order-total",children:(0,o.jsxs)("ul",{children:[(0,o.jsx)("li",{className:"order-total",children:"Total"}),(0,o.jsx)("li",{children:s.currencySymbol+e.toFixed(2)})]})})]}),(0,o.jsx)("div",{className:"payment-method"})]}),(0,o.jsx)("div",{className:"place-order mt-25",children:(0,o.jsx)("button",{className:"btn-hover",children:"Place Order"})})]})})]}):(0,o.jsx)("div",{className:"row",children:(0,o.jsx)("div",{className:"col-lg-12",children:(0,o.jsxs)("div",{className:"item-empty-area text-center",children:[(0,o.jsx)("div",{className:"item-empty-area__icon mb-30",children:(0,o.jsx)("i",{className:"pe-7s-cash"})}),(0,o.jsxs)("div",{className:"item-empty-area__text",children:["No items found in cart to checkout ",(0,o.jsx)("br",{})," ",(0,o.jsx)(c.rU,{to:"/store/build/shop-grid-standard",children:"Shop Now"})]})]})})})})})})]})}},2484:function(e,s,a){a.d(s,{Z:function(){return c}});var l=a(1087),i=a(184),c=function(e){e.pages;return(0,i.jsx)("div",{className:"breadcrumb-area bg-gray-3",children:(0,i.jsx)("div",{className:"container",style:{display:"flex",justifyContent:"center"},children:(0,i.jsx)("div",{class:"chapternav-wrapper",children:(0,i.jsxs)("ul",{class:"chapternav-items",children:[(0,i.jsx)("li",{class:"chapternav-item chapternav-item-macbook-air-m1",children:(0,i.jsxs)("a",{class:"chapternav-link","data-analytics-title":"macbook air m1",children:[(0,i.jsx)("figure",{class:"chapternav-icon"}),(0,i.jsx)("span",{class:"chapternav-label",children:"MacBook Air (M1)"})]})}),(0,i.jsx)("li",{class:"chapternav-item chapternav-item-macbook-air-m2",children:(0,i.jsxs)("a",{class:"chapternav-link","data-analytics-title":"macbook air m2",children:[(0,i.jsx)("figure",{class:"chapternav-icon"}),(0,i.jsx)("span",{class:"chapternav-label",children:"MacBook Air (M2)"})]})}),(0,i.jsx)(l.rU,{to:"/store/build/compare",children:(0,i.jsx)("li",{class:"chapternav-item chapternav-item-compare",children:(0,i.jsxs)("a",{class:"chapternav-link","data-analytics-title":"compare",children:[(0,i.jsx)("figure",{class:"chapternav-icon"}),(0,i.jsx)("span",{class:"chapternav-label",children:"Compare"})]})})}),(0,i.jsx)("li",{class:"chapternav-item chapternav-item-displays",children:(0,i.jsxs)("a",{class:"chapternav-link","data-analytics-title":"displays",children:[(0,i.jsx)("figure",{class:"chapternav-icon"}),(0,i.jsx)("span",{class:"chapternav-label",children:"Displays"})]})}),(0,i.jsx)("li",{class:"chapternav-item chapternav-item-accessories",children:(0,i.jsxs)("a",{class:"chapternav-link","data-analytics-title":"accessories",children:[(0,i.jsx)("figure",{class:"chapternav-icon"}),(0,i.jsx)("span",{class:"chapternav-label",children:"Accessories"})]})}),(0,i.jsx)(l.rU,{to:"/store/build/apple-care",children:(0,i.jsx)("li",{class:"chapternav-item chapternav-item-accessories",children:(0,i.jsxs)("a",{class:"chapternav-link","data-analytics-title":"accessories",children:[(0,i.jsx)("figure",{class:"chapternav-icon"}),(0,i.jsx)("span",{class:"chapternav-label",children:"AppleCare+ For Mac"})]})})})]})})})})}}}]);
//# sourceMappingURL=4026.bd9b92c2.chunk.js.map