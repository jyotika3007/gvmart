"use strict";(self.webpackChunkflone_react=self.webpackChunkflone_react||[]).push([[6010],{6010:function(e,s,a){a.r(s);var c=a(1413),t=a(885),i=a(2791),l=a(9434),n=a(7689),r=a(1087),d=a(3695),o=a(1770),h=a(5378),x=(a(2484),a(4275)),p=a(2073),m=a(184);s.default=function(){var e=0,s=(0,i.useState)(1),a=(0,t.Z)(s,1)[0],j=(0,l.I0)(),u=((0,n.TH)().pathname,(0,l.v9)((function(e){return e.currency}))),v=(0,l.v9)((function(e){return e.cart})).cartItems;return(0,m.jsxs)(i.Fragment,{children:[(0,m.jsx)(d.Z,{titleTemplate:"Cart",description:"Cart page of flone react minimalist eCommerce template."}),(0,m.jsx)(h.Z,{headerTop:"visible",children:(0,m.jsx)("div",{className:"cart-main-area pt-90 pb-100",children:(0,m.jsx)("div",{className:"container",children:v&&v.length>=1?(0,m.jsxs)(i.Fragment,{children:[(0,m.jsx)("h3",{className:"cart-page-title",children:"Your cart items"}),(0,m.jsx)("div",{className:"row",children:(0,m.jsx)("div",{className:"col-12",children:(0,m.jsx)("div",{className:"table-content table-responsive cart-table-content",children:(0,m.jsxs)("table",{children:[(0,m.jsx)("thead",{children:(0,m.jsxs)("tr",{children:[(0,m.jsx)("th",{children:"Image"}),(0,m.jsx)("th",{children:"Product Name"}),(0,m.jsx)("th",{children:"Unit Price"}),(0,m.jsx)("th",{children:"Qty"}),(0,m.jsx)("th",{children:"Subtotal"}),(0,m.jsx)("th",{children:"action"})]})}),(0,m.jsx)("tbody",{children:v.map((function(s,t){var l=(0,o.lk)(s.price,s.discount),n=(s.price*(null===u||void 0===u?void 0:u.currencyRate)).toFixed(2),d=(l*(null===u||void 0===u?void 0:u.currencyRate)).toFixed(2);return e+=null!=l?d*(null===s||void 0===s?void 0:s.quantity):n*(null===s||void 0===s?void 0:s.quantity),(0,m.jsxs)("tr",{children:[(0,m.jsx)("td",{className:"product-thumbnail",children:(0,m.jsx)(r.rU,{to:"/store/build/product/"+s.id,children:(0,m.jsx)("img",{className:"img-fluid",src:p.f+(null===s||void 0===s?void 0:s.cover),alt:""})})}),(0,m.jsxs)("td",{className:"product-name",children:[(0,m.jsx)(r.rU,{to:"/store/build/product/"+s.id,children:s.name}),s.selectedProductColor&&s.selectedProductSize?(0,m.jsxs)("div",{className:"cart-item-variation",children:[(0,m.jsxs)("span",{children:["Color: ",s.selectedProductColor]}),(0,m.jsxs)("span",{children:["Size: ",s.selectedProductSize]})]}):""]}),(0,m.jsx)("td",{className:"product-price-cart",children:null!==l?(0,m.jsxs)(i.Fragment,{children:[(0,m.jsx)("span",{className:"amount old",children:"Rs. "+n}),(0,m.jsx)("span",{className:"amount",children:"Rs. "+d})]}):(0,m.jsx)("span",{className:"amount",children:"Rs. "+n})}),(0,m.jsx)("td",{className:"product-quantity",children:(0,m.jsxs)("div",{className:"cart-plus-minus",children:[(0,m.jsx)("button",{className:"dec qtybutton",onClick:function(){return j((0,x.a3)(s))},children:"-"}),(0,m.jsx)("input",{className:"cart-plus-minus-box",type:"text",value:s.quantity,readOnly:!0}),(0,m.jsx)("button",{className:"inc qtybutton",onClick:function(){return j((0,x.Xq)((0,c.Z)((0,c.Z)({},s),{},{quantity:a})))},disabled:void 0!==s&&s.quantity&&s.quantity>=(0,o.hI)(s,s.selectedProductColor,s.selectedProductSize),children:"+"})]})}),(0,m.jsx)("td",{className:"product-subtotal",children:null!==l?"Rs. "+(d*s.quantity).toFixed(2):"Rs. "+(n*s.quantity).toFixed(2)}),(0,m.jsx)("td",{className:"product-remove",children:(0,m.jsx)("button",{onClick:function(){return j((0,x.EI)(s.cartItemId))},children:(0,m.jsx)("i",{className:"fa fa-times"})})})]},t)}))})]})})})}),(0,m.jsx)("div",{className:"row",children:(0,m.jsx)("div",{className:"col-lg-12",children:(0,m.jsxs)("div",{className:"cart-shiping-update-wrapper",children:[(0,m.jsx)("div",{className:"cart-shiping-update",children:(0,m.jsx)(r.rU,{to:"/store/build/shop-grid-standard",children:"Continue Shopping"})}),(0,m.jsx)("div",{className:"cart-clear",children:(0,m.jsx)("button",{onClick:function(){return j((0,x.sp)())},children:"Clear Shopping Cart"})})]})})}),(0,m.jsxs)("div",{className:"row",children:[(0,m.jsx)("div",{className:"col-lg-4 col-md-6",children:(0,m.jsxs)("div",{className:"cart-tax",children:[(0,m.jsx)("div",{className:"title-wrap",children:(0,m.jsx)("h4",{className:"cart-bottom-title section-bg-gray",children:"Estimate Shipping And Tax"})}),(0,m.jsxs)("div",{className:"tax-wrapper",children:[(0,m.jsx)("p",{children:"Enter your destination to get a shipping estimate."}),(0,m.jsxs)("div",{className:"tax-select-wrapper",children:[(0,m.jsxs)("div",{className:"tax-select",children:[(0,m.jsx)("label",{children:"* Country"}),(0,m.jsxs)("select",{className:"email s-email s-wid",children:[(0,m.jsx)("option",{children:"Bangladesh"}),(0,m.jsx)("option",{children:"Albania"}),(0,m.jsx)("option",{children:"\xc5land Islands"}),(0,m.jsx)("option",{children:"Afghanistan"}),(0,m.jsx)("option",{children:"Belgium"})]})]}),(0,m.jsxs)("div",{className:"tax-select",children:[(0,m.jsx)("label",{children:"* Region / State"}),(0,m.jsxs)("select",{className:"email s-email s-wid",children:[(0,m.jsx)("option",{children:"Bangladesh"}),(0,m.jsx)("option",{children:"Albania"}),(0,m.jsx)("option",{children:"\xc5land Islands"}),(0,m.jsx)("option",{children:"Afghanistan"}),(0,m.jsx)("option",{children:"Belgium"})]})]}),(0,m.jsxs)("div",{className:"tax-select",children:[(0,m.jsx)("label",{children:"* Zip/Postal Code"}),(0,m.jsx)("input",{type:"text"})]}),(0,m.jsx)("button",{className:"cart-btn-2",type:"submit",children:"Get A Quote"})]})]})]})}),(0,m.jsx)("div",{className:"col-lg-4 col-md-6",children:(0,m.jsxs)("div",{className:"discount-code-wrapper",children:[(0,m.jsx)("div",{className:"title-wrap",children:(0,m.jsx)("h4",{className:"cart-bottom-title section-bg-gray",children:"Use Coupon Code"})}),(0,m.jsxs)("div",{className:"discount-code",children:[(0,m.jsx)("p",{children:"Enter your coupon code if you have one."}),(0,m.jsxs)("form",{children:[(0,m.jsx)("input",{type:"text",required:!0,name:"name"}),(0,m.jsx)("button",{className:"cart-btn-2",type:"submit",children:"Apply Coupon"})]})]})]})}),(0,m.jsx)("div",{className:"col-lg-4 col-md-12",children:(0,m.jsxs)("div",{className:"grand-totall",children:[(0,m.jsx)("div",{className:"title-wrap",children:(0,m.jsx)("h4",{className:"cart-bottom-title section-bg-gary-cart",children:"Cart Total"})}),(0,m.jsxs)("h5",{children:["Total products"," ",(0,m.jsx)("span",{children:"Rs. "+e.toFixed(2)})]}),(0,m.jsxs)("h4",{className:"grand-totall-title",children:["Grand Total"," ",(0,m.jsx)("span",{children:"Rs. "+e.toFixed(2)})]}),(0,m.jsx)(r.rU,{to:"/store/build/checkout",children:"Proceed to Checkout"})]})})]})]}):(0,m.jsx)("div",{className:"row",children:(0,m.jsx)("div",{className:"col-lg-12",children:(0,m.jsxs)("div",{className:"item-empty-area text-center",children:[(0,m.jsx)("div",{className:"item-empty-area__icon mb-30",children:(0,m.jsx)("i",{className:"pe-7s-cart"})}),(0,m.jsxs)("div",{className:"item-empty-area__text",children:["No items found in cart ",(0,m.jsx)("br",{})," ",(0,m.jsx)(r.rU,{to:"/store/build/shop-grid-standard",children:"Shop Now"})]})]})})})})})})]})}},2484:function(e,s,a){a.d(s,{Z:function(){return i}});var c=a(1087),t=a(184),i=function(e){e.pages;return(0,t.jsx)("div",{className:"breadcrumb-area bg-gray-3",children:(0,t.jsx)("div",{className:"container",style:{display:"flex",justifyContent:"center"},children:(0,t.jsx)("div",{class:"chapternav-wrapper",children:(0,t.jsxs)("ul",{class:"chapternav-items",children:[(0,t.jsx)("li",{class:"chapternav-item chapternav-item-macbook-air-m1",children:(0,t.jsxs)("a",{class:"chapternav-link","data-analytics-title":"macbook air m1",children:[(0,t.jsx)("figure",{class:"chapternav-icon"}),(0,t.jsx)("span",{class:"chapternav-label",children:"MacBook Air (M1)"})]})}),(0,t.jsx)("li",{class:"chapternav-item chapternav-item-macbook-air-m2",children:(0,t.jsxs)("a",{class:"chapternav-link","data-analytics-title":"macbook air m2",children:[(0,t.jsx)("figure",{class:"chapternav-icon"}),(0,t.jsx)("span",{class:"chapternav-label",children:"MacBook Air (M2)"})]})}),(0,t.jsx)(c.rU,{to:"/store/build/compare",children:(0,t.jsx)("li",{class:"chapternav-item chapternav-item-compare",children:(0,t.jsxs)("a",{class:"chapternav-link","data-analytics-title":"compare",children:[(0,t.jsx)("figure",{class:"chapternav-icon"}),(0,t.jsx)("span",{class:"chapternav-label",children:"Compare"})]})})}),(0,t.jsx)("li",{class:"chapternav-item chapternav-item-displays",children:(0,t.jsxs)("a",{class:"chapternav-link","data-analytics-title":"displays",children:[(0,t.jsx)("figure",{class:"chapternav-icon"}),(0,t.jsx)("span",{class:"chapternav-label",children:"Displays"})]})}),(0,t.jsx)("li",{class:"chapternav-item chapternav-item-accessories",children:(0,t.jsxs)("a",{class:"chapternav-link","data-analytics-title":"accessories",children:[(0,t.jsx)("figure",{class:"chapternav-icon"}),(0,t.jsx)("span",{class:"chapternav-label",children:"Accessories"})]})}),(0,t.jsx)(c.rU,{to:"/store/build/apple-care",children:(0,t.jsx)("li",{class:"chapternav-item chapternav-item-accessories",children:(0,t.jsxs)("a",{class:"chapternav-link","data-analytics-title":"accessories",children:[(0,t.jsx)("figure",{class:"chapternav-icon"}),(0,t.jsx)("span",{class:"chapternav-label",children:"AppleCare+ For Mac"})]})})})]})})})})}}}]);
//# sourceMappingURL=6010.bad80546.chunk.js.map