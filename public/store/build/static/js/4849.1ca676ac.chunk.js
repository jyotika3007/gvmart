"use strict";(self.webpackChunkflone_react=self.webpackChunkflone_react||[]).push([[4849],{6664:function(e,s,i){var a=i(1413),t=i(885),n=i(2791),c=i(1496),r=i(4508),l=i(9434),o=i(2558),d=i(7842),u=i(1770),p=i(4275),m=i(8725),h=i(1065),v=i(2073),x=i(184);s.Z=function(e){var s=e.product,i=(e.currency,e.discountedPrice),j=e.finalProductPrice,f=e.finalDiscountedPrice,N=e.show,g=e.onHide,b=e.wishlistItem,w=e.compareItem,k=(0,n.useState)(null),Z=(0,t.Z)(k,2),y=Z[0],C=Z[1],S=(0,l.I0)(),_=(0,l.v9)((function(e){return e.cart})).cartItems,P=(0,n.useState)(s.variation?s.variation[0].color:""),A=(0,t.Z)(P,2),q=A[0],I=A[1],z=(0,n.useState)(s.variation?s.variation[0].size[0].name:""),B=(0,t.Z)(z,2),F=B[0],E=B[1],H=(0,n.useState)(s.variation?s.variation[0].size[0].stock:s.stock),L=(0,t.Z)(H,2),R=L[0],V=L[1],D=(0,n.useState)(1),O=(0,t.Z)(D,2),T=O[0],M=O[1],U=(0,u.bh)(_,s,q,F),W={spaceBetween:10,loop:!0,effect:"fade",fadeEffect:{crossFade:!0},thumbs:{swiper:y},modules:[c.xW,c.o3]},X={onSwiper:C,spaceBetween:10,slidesPerView:4,touchRatio:.2,freeMode:!0,loop:!0,slideToClickedSlide:!0,navigation:!0};return(0,x.jsxs)(r.Z,{show:N,onHide:function(){C(null),g()},className:"product-quickview-modal-wrapper",children:[(0,x.jsx)(r.Z.Header,{closeButton:!0}),(0,x.jsx)("div",{className:"modal-body",children:(0,x.jsxs)("div",{className:"row",children:[(0,x.jsxs)("div",{className:"col-md-5 col-sm-12 col-xs-12",children:[(0,x.jsx)("div",{className:"product-large-image-wrapper",children:(0,x.jsx)(d.Z,{options:W,children:(0,x.jsx)("div",{className:"single-image",children:(0,x.jsx)("img",{src:v.f+s.cover,className:"img-fluid",alt:"Product"})})})}),(0,x.jsx)("div",{className:"product-small-image-wrapper mt-15",children:(0,x.jsx)(d.Z,{options:X,children:s.image&&s.image.map((function(e,s){return(0,x.jsx)(d.o,{children:(0,x.jsx)("div",{className:"single-image",children:(0,x.jsx)("img",{src:"/store/build"+e,className:"img-fluid",alt:""})})},s)}))})})]}),(0,x.jsx)("div",{className:"col-md-7 col-sm-12 col-xs-12",children:(0,x.jsxs)("div",{className:"product-details-content quickview-content",children:[(0,x.jsx)("h2",{children:s.name}),(0,x.jsx)("div",{className:"product-details-price",children:null!==i?(0,x.jsxs)(n.Fragment,{children:[(0,x.jsx)("span",{children:"Rs. "+f})," ",(0,x.jsx)("span",{className:"old",children:"Rs. "+j})]}):(0,x.jsxs)("span",{children:["Rs. "+j," "]})}),s.rating&&s.rating>0?(0,x.jsx)("div",{className:"pro-details-rating-wrap",children:(0,x.jsx)("div",{className:"pro-details-rating",children:(0,x.jsx)(o.Z,{ratingValue:s.rating})})}):"",(0,x.jsx)("div",{className:"pro-details-list",children:(0,x.jsx)("p",{children:s.shortDescription})}),s.variation?(0,x.jsxs)("div",{className:"pro-details-size-color",children:[(0,x.jsxs)("div",{className:"pro-details-color-wrap",children:[(0,x.jsx)("span",{children:"Color"}),(0,x.jsx)("div",{className:"pro-details-color-content",children:s.variation.map((function(e,s){return(0,x.jsxs)("label",{className:"pro-details-color-content--single ".concat(e.color),children:[(0,x.jsx)("input",{type:"radio",value:e.color,name:"product-color",checked:e.color===q?"checked":"",onChange:function(){I(e.color),E(e.size[0].name),V(e.size[0].stock),M(1)}}),(0,x.jsx)("span",{className:"checkmark"})]},s)}))})]}),(0,x.jsxs)("div",{className:"pro-details-size",children:[(0,x.jsx)("span",{children:"Size"}),(0,x.jsx)("div",{className:"pro-details-size-content",children:s.variation&&s.variation.map((function(e){return e.color===q?e.size.map((function(e,s){return(0,x.jsxs)("label",{className:"pro-details-size-content--single",children:[(0,x.jsx)("input",{type:"radio",value:e.name,checked:e.name===F?"checked":"",onChange:function(){E(e.name),V(e.stock),M(1)}}),(0,x.jsx)("span",{className:"size-name",children:e.name})]},s)})):""}))})]})]}):"",s.affiliateLink?(0,x.jsx)("div",{className:"pro-details-quality",children:(0,x.jsx)("div",{className:"pro-details-cart btn-hover",children:(0,x.jsx)("a",{href:s.affiliateLink,rel:"noopener noreferrer",target:"_blank",children:"Buy Now"})})}):(0,x.jsxs)("div",{className:"pro-details-quality",children:[(0,x.jsxs)("div",{className:"cart-plus-minus",children:[(0,x.jsx)("button",{onClick:function(){return M(T>1?T-1:1)},className:"dec qtybutton",children:"-"}),(0,x.jsx)("input",{className:"cart-plus-minus-box",type:"text",value:T,readOnly:!0}),(0,x.jsx)("button",{onClick:function(){return M(T<R-U?T+1:T)},className:"inc qtybutton",children:"+"})]}),(0,x.jsx)("div",{className:"pro-details-cart btn-hover",children:s.stock_quantity&&s.stock_quantity>0?(0,x.jsxs)("button",{onClick:function(){return S((0,p.Xq)((0,a.Z)((0,a.Z)({},s),{},{quantity:T,selectedProductColor:q||(s.selectedProductColor?s.selectedProductColor:null),selectedProductSize:F||(s.selectedProductSize?s.selectedProductSize:null)})))},disabled:U>=R,children:[" ","Add To Cart"," "]}):(0,x.jsx)("button",{disabled:!0,children:"Out of Stock"})}),(0,x.jsx)("div",{className:"pro-details-wishlist",children:(0,x.jsx)("button",{className:void 0!==b?"active":"",disabled:void 0!==b,title:void 0!==b?"Added to wishlist":"Add to wishlist",onClick:function(){return S((0,m.Mp)(s))},children:(0,x.jsx)("i",{className:"pe-7s-like"})})}),(0,x.jsx)("div",{className:"pro-details-compare",children:(0,x.jsx)("button",{className:void 0!==w?"active":"",disabled:void 0!==w,title:void 0!==w?"Added to compare":"Add to compare",onClick:function(){return S((0,h.a$)(s))},children:(0,x.jsx)("i",{className:"pe-7s-shuffle"})})})]})]})})]})})]})}},2558:function(e,s,i){var a=i(2791),t=i(184);s.Z=function(e){for(var s=e.ratingValue,i=[],n=0;n<5;n++)i.push((0,t.jsx)("i",{className:"fa fa-star-o"},n));if(s&&s>0)for(var c=0;c<=s-1;c++)i[c]=(0,t.jsx)("i",{className:"fa fa-star-o yellow"},c);return(0,t.jsx)(a.Fragment,{children:i})}},7842:function(e,s,i){i.d(s,{o:function(){return l.o5}});var a=i(2982),t=i(1413),n=i(2791),c=i(8182),r=i(1496),l=i(8563),o=i(184),d=(0,n.forwardRef)((function(e,s){var i=e.options,n=e.prevIcon,d=e.nextIcon,u=e.children,p=e.className,m=e.navClass,h=void 0!==(null===i||void 0===i?void 0:i.modules)?i.modules:[],v="prev-".concat(m||"swiper-nav"),x="next-".concat(m||"swiper-nav"),j=(0,t.Z)((0,t.Z)({slidesPerView:1,spaceBetween:0,loop:!1,autoplay:!(null===i||void 0===i||!i.autoplay)&&{delay:2500,disableOnInteraction:!1},watchSlidesProgress:!0,autoHeight:!0,breakpoints:{}},i),{},{modules:[r.W_,r.tl,r.s5,r.pt].concat((0,a.Z)(h)),navigation:!(null===i||void 0===i||!i.navigation)&&{prevEl:".".concat(v),nextEl:".".concat(x)},pagination:!(null===i||void 0===i||!i.pagination)&&{clickable:!0}});return(0,o.jsxs)("div",{className:(0,c.Z)("swiper-wrap",p),ref:s,children:[(0,o.jsx)(l.tq,(0,t.Z)((0,t.Z)({},j),{},{children:u})),(null===j||void 0===j?void 0:j.navigation)&&(0,o.jsxs)(o.Fragment,{children:[(0,o.jsx)("button",{type:"button",className:"swiper-button-prev ht-swiper-button-nav ".concat(v),children:(0,o.jsx)("i",{className:(0,c.Z)(n,"icon")})}),(0,o.jsx)("button",{type:"button",className:"swiper-button-next ht-swiper-button-nav ".concat(x),children:(0,o.jsx)("i",{className:(0,c.Z)(d,"icon")})})]})]})}));d.defaultProps={prevIcon:"pe-7s-angle-left",nextIcon:"pe-7s-angle-right",navStyle:1,dotStyle:1},s.Z=d},4849:function(e,s,i){i.r(s),i.d(s,{default:function(){return u}});var a=i(885),t=i(2791),n=(i(6443),i(9434)),c=i(7689),r=i(1770),l=i(3695),o=i(5378),d=(i(4427),i(184)),u=function(e){e.location;var s=(0,t.useState)("three-column"),i=(0,a.Z)(s,2),u=(i[0],i[1],(0,t.useState)("")),p=(0,a.Z)(u,2),m=p[0],h=(p[1],(0,t.useState)("")),v=(0,a.Z)(h,2),x=v[0],j=(v[1],(0,t.useState)("")),f=(0,a.Z)(j,2),N=f[0],g=(f[1],(0,t.useState)("")),b=(0,a.Z)(g,2),w=b[0],k=(b[1],(0,t.useState)(0)),Z=(0,a.Z)(k,2),y=Z[0],C=(Z[1],(0,t.useState)(1)),S=(0,a.Z)(C,2),_=(S[0],S[1],(0,t.useState)([])),P=(0,a.Z)(_,2),A=(P[0],P[1]),q=(0,t.useState)([]),I=(0,a.Z)(q,2),z=(I[0],I[1]),B=(0,n.v9)((function(e){return e.product})).products;(0,c.TH)().pathname;return(0,t.useEffect)((function(){var e=(0,r.LB)(B,m,x),s=(0,r.LB)(e,N,w);z(e=s),A(e.slice(y,y+15))}),[y,B,m,x,N,w]),(0,d.jsxs)(t.Fragment,{children:[(0,d.jsx)(l.Z,{titleTemplate:"Shop Page",description:"Shop page of flone react minimalist eCommerce template."}),(0,d.jsx)(o.Z,{headerTop:"visible",children:(0,d.jsx)("div",{className:"shop-area pt-95 pb-100",children:(0,d.jsx)("div",{className:"container-fluid",children:(0,d.jsx)("div",{className:"row",children:(0,d.jsx)("div",{className:"AppleCareContainer",children:[1,2,3,4].map((function(){return(0,d.jsxs)("div",{className:"AppleCareCard",children:[(0,d.jsx)("div",{children:(0,d.jsx)("img",{src:"https://cdn.dribbble.com/users/1161517/screenshots/7896076/media/24ae74ddb6c9eb7789ae3a189a6b30ae.gif",width:"100%"})}),(0,d.jsx)("div",{className:"AppleCareDescription",children:(0,d.jsxs)("span",{children:["Apple Care+ for MAC (3Years) ",(0,d.jsx)("br",{}),"All Damage (Screen Not Applicable)"]})}),(0,d.jsx)("div",{className:"AppleCarePrice",children:"Rs. 30,000"})]})}))})})})})})]})}},4427:function(e,s,i){i.d(s,{Z:function(){return v}});var a=i(8182),t=i(2791),n=i(9434),c=i(885),r=i(1087),l=i(2558),o=i(6664),d=i(4275),u=i(8725),p=(i(1065),i(184)),m=function(e){var s,i=e.product,m=e.currency,h=e.cartItem,v=e.wishlistItem,x=e.compareItem,j=e.spaceBottomClass,f=(0,t.useState)(!1),N=(0,c.Z)(f,2),g=N[0],b=N[1],w=i.price,k=i.price,Z=i.price,y=(0,n.I0)();return(0,p.jsxs)(t.Fragment,{children:[(0,p.jsxs)("div",{className:(0,a.Z)("product-wrap",j),children:[(0,p.jsxs)("div",{className:"product-img",children:[(0,p.jsxs)(r.rU,{to:"/store/build/product/"+i.slug+"/"+i.id,children:[(0,p.jsx)("img",{className:"default-img",src:"https://www.iadvance.in/thumb_cache/350x350__width_height__1667977683__uploaded_files%5Eb07c325ed195f58435375767d132d37d.jpeg",alt:""}),(null===i||void 0===i||null===(s=i.image)||void 0===s?void 0:s.length)>1?(0,p.jsx)("img",{className:"hover-img",src:"https://www.iadvance.in/thumb_cache/350x350__width_height__1667977683__uploaded_files%5Eb07c325ed195f58435375767d132d37d.jpeg",alt:""}):""]}),i.discount||i.new?(0,p.jsxs)("div",{className:"product-img-badges",children:[i.discount?(0,p.jsxs)("span",{className:"pink",children:["-",i.discount,"%"]}):"",i.new?(0,p.jsx)("span",{className:"purple",children:"New"}):""]}):"",(0,p.jsxs)("div",{className:"product-action",children:[(0,p.jsx)("div",{className:"pro-same-action pro-wishlist",children:(0,p.jsx)("button",{className:void 0!==v?"active":"",disabled:void 0!==v,title:void 0!==v?"Added to wishlist":"Add to wishlist",onClick:function(){return y((0,u.Mp)(i))},children:(0,p.jsx)("i",{className:"pe-7s-like"})})}),(0,p.jsx)("div",{className:"pro-same-action pro-cart",children:i.affiliateLink?(0,p.jsxs)("a",{href:i.affiliateLink,rel:"noopener noreferrer",target:"_blank",children:[" ","Buy now"," "]}):i.variation&&i.variation.length>=1?(0,p.jsx)(r.rU,{to:"".concat("/store/build","/product/").concat(i.id),children:"Select Option"}):i.stock_quantity&&i.stock_quantity>0?(0,p.jsxs)("button",{onClick:function(){return y((0,d.Xq)(i))},className:void 0!==h&&h.quantity>0?"active":"",disabled:void 0!==h&&h.quantity>0,title:void 0!==h?"Added to cart":"Add to cart",children:[" ",(0,p.jsx)("i",{className:"pe-7s-cart"})," ",void 0!==h&&h.quantity>0?"Added":"Add to cart"]}):(0,p.jsx)("button",{disabled:!0,className:"active",children:"Out of Stock"})}),(0,p.jsx)("div",{className:"pro-same-action pro-quickview",children:(0,p.jsx)("button",{onClick:function(){return b(!0)},title:"Quick View",children:(0,p.jsx)("i",{className:"pe-7s-look"})})})]})]}),(0,p.jsxs)("div",{className:"product-content text-center",children:[(0,p.jsx)("h3",{children:(0,p.jsx)(r.rU,{to:"/store/build/product/"+i.id,children:i.name})}),i.rating&&i.rating>0?(0,p.jsx)("div",{className:"product-rating",children:(0,p.jsx)(l.Z,{ratingValue:i.rating})}):"",(0,p.jsx)("div",{className:"product-price",children:null!==w?(0,p.jsxs)(t.Fragment,{children:[(0,p.jsx)("span",{children:Z})," ",(0,p.jsx)("span",{className:"old",children:k})]}):(0,p.jsxs)("span",{children:[k," "]})})]})]}),(0,p.jsx)(o.Z,{show:g,onHide:function(){return b(!1)},product:i,currency:m,discountedPrice:w,finalProductPrice:k,finalDiscountedPrice:Z,wishlistItem:v,compareItem:x})]})},h=function(e){var s=e.products,i=e.spaceBottomClass;(0,n.v9)((function(e){return e.currency})),(0,n.v9)((function(e){return e.cart})).cartItems,(0,n.v9)((function(e){return e.wishlist})).wishlistItems,(0,n.v9)((function(e){return e.compare})).compareItems;return console.log(s,"test"),(0,p.jsx)(t.Fragment,{children:null===s||void 0===s?void 0:s.map((function(e){return(0,p.jsx)("div",{className:"col-xl-4 col-sm-6",children:(0,p.jsx)(m,{spaceBottomClass:i,product:e})},e.id)}))})},v=function(e){var s=e.products,i=e.layout;return(0,p.jsx)("div",{className:"shop-bottom-area mt-35",children:(0,p.jsx)("div",{className:(0,a.Z)("row",i),children:(0,p.jsx)(h,{products:s,spaceBottomClass:"mb-25"})})})}}}]);
//# sourceMappingURL=4849.1ca676ac.chunk.js.map