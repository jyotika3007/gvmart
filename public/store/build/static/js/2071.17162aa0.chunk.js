"use strict";(self.webpackChunkflone_react=self.webpackChunkflone_react||[]).push([[2071],{627:function(e,t,n){function r(e){return"string"===typeof e}n.d(t,{Z:function(){return r}})},1503:function(e,t,n){function r(e,t){return"function"===typeof e?e(t):e}n.d(t,{Z:function(){return r}})},8069:function(e,t,n){n.d(t,{Z:function(){return v}});var r=n(7462),a=n(3366),o=n(7563),i=n(627);var l=n(8182);function s(e){if(void 0===e)return{};var t={};return Object.keys(e).filter((function(t){return!(t.match(/^on[A-Z]/)&&"function"===typeof e[t])})).forEach((function(n){t[n]=e[n]})),t}function u(e){var t=e.getSlotProps,n=e.additionalProps,a=e.externalSlotProps,o=e.externalForwardedProps,i=e.className;if(!t){var u=(0,l.Z)(null==o?void 0:o.className,null==a?void 0:a.className,i,null==n?void 0:n.className),c=(0,r.Z)({},null==n?void 0:n.style,null==o?void 0:o.style,null==a?void 0:a.style),d=(0,r.Z)({},n,o,a);return u.length>0&&(d.className=u),Object.keys(c).length>0&&(d.style=c),{props:d,internalRef:void 0}}var v=function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:[];if(void 0===e)return{};var n={};return Object.keys(e).filter((function(n){return n.match(/^on[A-Z]/)&&"function"===typeof e[n]&&!t.includes(n)})).forEach((function(t){n[t]=e[t]})),n}((0,r.Z)({},o,a)),f=s(a),m=s(o),p=t(v),h=(0,l.Z)(null==p?void 0:p.className,null==n?void 0:n.className,i,null==o?void 0:o.className,null==a?void 0:a.className),b=(0,r.Z)({},null==p?void 0:p.style,null==n?void 0:n.style,null==o?void 0:o.style,null==a?void 0:a.style),x=(0,r.Z)({},p,n,m,f);return h.length>0&&(x.className=h),Object.keys(b).length>0&&(x.style=b),{props:x,internalRef:p.ref}}var c=n(1503),d=["elementType","externalSlotProps","ownerState"];function v(e){var t,n=e.elementType,l=e.externalSlotProps,s=e.ownerState,v=(0,a.Z)(e,d),f=(0,c.Z)(l,s),m=u((0,r.Z)({},v,{externalSlotProps:f})),p=m.props,h=m.internalRef,b=(0,o.Z)(h,null==f?void 0:f.ref,null==(t=e.additionalProps)?void 0:t.ref),x=function(e,t,n){return void 0===e||(0,i.Z)(e)?t:(0,r.Z)({},t,{ownerState:(0,r.Z)({},t.ownerState,n)})}(n,(0,r.Z)({},p,{ref:b}),s);return x}},6747:function(e,t,n){n.d(t,{Z:function(){return Z}});var r=n(7462),a=n(3366),o=n(2791),i=n(8182),l=n(2421),s=n(104),u=n(2982),c=n(2466),d=n(7416),v=["sx"];function f(e){var t,n=e.sx,o=function(e){var t,n,r={systemProps:{},otherProps:{}},a=null!=(t=null==e||null==(n=e.theme)?void 0:n.unstable_sxConfig)?t:d.Z;return Object.keys(e).forEach((function(t){a[t]?r.systemProps[t]=e[t]:r.otherProps[t]=e[t]})),r}((0,a.Z)(e,v)),i=o.systemProps,l=o.otherProps;return t=Array.isArray(n)?[i].concat((0,u.Z)(n)):"function"===typeof n?function(){var e=n.apply(void 0,arguments);return(0,c.P)(e)?(0,r.Z)({},i,e):i}:(0,r.Z)({},i,n),(0,r.Z)({},l,{sx:t})}var m=n(886),p=n(184),h=["className","component"];var b=n(5902),x=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},t=e.defaultTheme,n=e.defaultClassName,u=void 0===n?"MuiBox-root":n,c=e.generateClassName,d=(0,l.ZP)("div",{shouldForwardProp:function(e){return"theme"!==e&&"sx"!==e&&"as"!==e}})(s.Z),v=o.forwardRef((function(e,n){var o=(0,m.Z)(t),l=f(e),s=l.className,v=l.component,b=void 0===v?"div":v,x=(0,a.Z)(l,h);return(0,p.jsx)(d,(0,r.Z)({as:b,ref:n,className:(0,i.Z)(s,c?c(u):u),theme:o},x))}));return v}({defaultTheme:(0,n(7107).Z)(),defaultClassName:"MuiBox-root",generateClassName:b.Z.generate}),Z=x},3963:function(e,t,n){n.d(t,{ZP:function(){return te}});var r=n(4942),a=n(3366),o=n(7462),i=n(2791),l=n(8182),s=n(4419),u=n(8069),c=n(627),d=n(2982),v=n(885),f=n(9723),m=n(8959),p=n(5372),h=n(7563),b=n(5721),x=n(8956),Z={border:0,clip:"rect(0 0 0 0)",height:"1px",margin:-1,overflow:"hidden",padding:0,position:"absolute",whiteSpace:"nowrap",width:"1px"};function g(e,t){return e-t}function y(e,t,n){return null==e?t:Math.min(Math.max(t,e),n)}function k(e,t){var n;return(null!=(n=e.reduce((function(e,n,r){var a=Math.abs(t-n);return null===e||a<e.distance||a===e.distance?{distance:a,index:r}:e}),null))?n:{}).index}function w(e,t){if(void 0!==t.current&&e.changedTouches){for(var n=e,r=0;r<n.changedTouches.length;r+=1){var a=n.changedTouches[r];if(a.identifier===t.current)return{x:a.clientX,y:a.clientY}}return!1}return{x:e.clientX,y:e.clientY}}function S(e,t,n){return 100*(e-t)/(n-t)}function N(e,t,n){var r=Math.round((e-n)/t)*t+n;return Number(r.toFixed(function(e){if(Math.abs(e)<1){var t=e.toExponential().split("e-"),n=t[0].split(".")[1];return(n?n.length:0)+parseInt(t[1],10)}var r=e.toString().split(".")[1];return r?r.length:0}(t)))}function P(e){var t=e.values,n=e.newValue,r=e.index,a=t.slice();return a[r]=n,a.sort(g)}function C(e){var t,n,r,a=e.sliderRef,o=e.activeIndex,i=e.setActive,l=(0,f.Z)(a.current);null!=(t=a.current)&&t.contains(l.activeElement)&&Number(null==l||null==(n=l.activeElement)?void 0:n.getAttribute("data-index"))===o||(null==(r=a.current)||r.querySelector('[type="range"][data-index="'.concat(o,'"]')).focus());i&&i(o)}var L,E={horizontal:{offset:function(e){return{left:"".concat(e,"%")}},leap:function(e){return{width:"".concat(e,"%")}}},"horizontal-reverse":{offset:function(e){return{right:"".concat(e,"%")}},leap:function(e){return{width:"".concat(e,"%")}}},vertical:{offset:function(e){return{bottom:"".concat(e,"%")}},leap:function(e){return{height:"".concat(e,"%")}}}},A=function(e){return e};function R(){return void 0===L&&(L="undefined"===typeof CSS||"function"!==typeof CSS.supports||CSS.supports("touch-action","none")),L}function z(e){var t=e["aria-labelledby"],n=e.defaultValue,r=e.disabled,a=void 0!==r&&r,l=e.disableSwap,s=void 0!==l&&l,u=e.isRtl,c=void 0!==u&&u,L=e.marks,z=void 0!==L&&L,j=e.max,T=void 0===j?100:j,M=e.min,I=void 0===M?0:M,O=e.name,V=e.onChange,F=e.onChangeCommitted,K=e.orientation,D=void 0===K?"horizontal":K,B=e.ref,Y=e.scale,H=void 0===Y?A:Y,X=e.step,_=void 0===X?1:X,q=e.tabIndex,W=e.value,U=i.useRef(),$=i.useState(-1),G=(0,v.Z)($,2),J=G[0],Q=G[1],ee=i.useState(-1),te=(0,v.Z)(ee,2),ne=te[0],re=te[1],ae=i.useState(!1),oe=(0,v.Z)(ae,2),ie=oe[0],le=oe[1],se=i.useRef(0),ue=(0,m.Z)({controlled:W,default:null!=n?n:I,name:"Slider"}),ce=(0,v.Z)(ue,2),de=ce[0],ve=ce[1],fe=V&&function(e,t,n){var r=e.nativeEvent||e,a=new r.constructor(r.type,r);Object.defineProperty(a,"target",{writable:!0,value:{value:t,name:O}}),V(a,t,n)},me=Array.isArray(de),pe=me?de.slice().sort(g):[de];pe=pe.map((function(e){return y(e,I,T)}));var he=!0===z&&null!==_?(0,d.Z)(Array(Math.floor((T-I)/_)+1)).map((function(e,t){return{value:I+_*t}})):z||[],be=he.map((function(e){return e.value})),xe=(0,p.Z)(),Ze=xe.isFocusVisibleRef,ge=xe.onBlur,ye=xe.onFocus,ke=xe.ref,we=i.useState(-1),Se=(0,v.Z)(we,2),Ne=Se[0],Pe=Se[1],Ce=i.useRef(),Le=(0,h.Z)(ke,Ce),Ee=(0,h.Z)(B,Le),Ae=function(e){return function(t){var n,r=Number(t.currentTarget.getAttribute("data-index"));ye(t),!0===Ze.current&&Pe(r),re(r),null==e||null==(n=e.onFocus)||n.call(e,t)}},Re=function(e){return function(t){var n;ge(t),!1===Ze.current&&Pe(-1),re(-1),null==e||null==(n=e.onBlur)||n.call(e,t)}};(0,b.Z)((function(){var e;a&&Ce.current.contains(document.activeElement)&&(null==(e=document.activeElement)||e.blur())}),[a]),a&&-1!==J&&Q(-1),a&&-1!==Ne&&Pe(-1);var ze=function(e){return function(t){var n;null==(n=e.onChange)||n.call(e,t);var r=Number(t.currentTarget.getAttribute("data-index")),a=pe[r],o=be.indexOf(a),i=t.target.valueAsNumber;if(he&&null==_&&(i=i<a?be[o-1]:be[o+1]),i=y(i,I,T),he&&null==_){var l=be.indexOf(pe[r]);i=i<pe[r]?be[l-1]:be[l+1]}if(me){s&&(i=y(i,pe[r-1]||-1/0,pe[r+1]||1/0));var u=i;i=P({values:pe,newValue:i,index:r});var c=r;s||(c=i.indexOf(u)),C({sliderRef:Ce,activeIndex:c})}ve(i),Pe(r),fe&&fe(t,i,r),F&&F(t,i)}},je=i.useRef(),Te=D;c&&"horizontal"===D&&(Te+="-reverse");var Me=function(e){var t,n,r=e.finger,a=e.move,o=void 0!==a&&a,i=Ce.current.getBoundingClientRect(),l=i.width,u=i.height,c=i.bottom,d=i.left;if(t=0===Te.indexOf("vertical")?(c-r.y)/u:(r.x-d)/l,-1!==Te.indexOf("-reverse")&&(t=1-t),n=function(e,t,n){return(n-t)*e+t}(t,I,T),_)n=N(n,_,I);else{var v=k(be,n);n=be[v]}n=y(n,I,T);var f=0;if(me){f=o?je.current:k(pe,n),s&&(n=y(n,pe[f-1]||-1/0,pe[f+1]||1/0));var m=n;n=P({values:pe,newValue:n,index:f}),s&&o||(f=n.indexOf(m),je.current=f)}return{newValue:n,activeIndex:f}},Ie=(0,x.Z)((function(e){var t=w(e,U);if(t)if(se.current+=1,"mousemove"!==e.type||0!==e.buttons){var n=Me({finger:t,move:!0}),r=n.newValue,a=n.activeIndex;C({sliderRef:Ce,activeIndex:a,setActive:Q}),ve(r),!ie&&se.current>2&&le(!0),fe&&r!==de&&fe(e,r,a)}else Oe(e)})),Oe=(0,x.Z)((function(e){var t=w(e,U);if(le(!1),t){var n=Me({finger:t,move:!0}).newValue;Q(-1),"touchend"===e.type&&re(-1),F&&F(e,n),U.current=void 0,Fe()}})),Ve=(0,x.Z)((function(e){if(!a){R()||e.preventDefault();var t=e.changedTouches[0];null!=t&&(U.current=t.identifier);var n=w(e,U);if(!1!==n){var r=Me({finger:n}),o=r.newValue,i=r.activeIndex;C({sliderRef:Ce,activeIndex:i,setActive:Q}),ve(o),fe&&fe(e,o,i)}se.current=0;var l=(0,f.Z)(Ce.current);l.addEventListener("touchmove",Ie),l.addEventListener("touchend",Oe)}})),Fe=i.useCallback((function(){var e=(0,f.Z)(Ce.current);e.removeEventListener("mousemove",Ie),e.removeEventListener("mouseup",Oe),e.removeEventListener("touchmove",Ie),e.removeEventListener("touchend",Oe)}),[Oe,Ie]);i.useEffect((function(){var e=Ce.current;return e.addEventListener("touchstart",Ve,{passive:R()}),function(){e.removeEventListener("touchstart",Ve,{passive:R()}),Fe()}}),[Fe,Ve]),i.useEffect((function(){a&&Fe()}),[a,Fe]);var Ke=function(e){return function(t){var n;if(null==(n=e.onMouseDown)||n.call(e,t),!a&&!t.defaultPrevented&&0===t.button){t.preventDefault();var r=w(t,U);if(!1!==r){var o=Me({finger:r}),i=o.newValue,l=o.activeIndex;C({sliderRef:Ce,activeIndex:l,setActive:Q}),ve(i),fe&&fe(t,i,l)}se.current=0;var s=(0,f.Z)(Ce.current);s.addEventListener("mousemove",Ie),s.addEventListener("mouseup",Oe)}}},De=S(me?pe[0]:I,I,T),Be=S(pe[pe.length-1],I,T)-De,Ye=function(e){return function(t){var n;null==(n=e.onMouseOver)||n.call(e,t);var r=Number(t.currentTarget.getAttribute("data-index"));re(r)}},He=function(e){return function(t){var n;null==(n=e.onMouseLeave)||n.call(e,t),re(-1)}};return{active:J,axis:Te,axisProps:E,dragging:ie,focusedThumbIndex:Ne,getHiddenInputProps:function(){var n,r=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},i={onChange:ze(r||{}),onFocus:Ae(r||{}),onBlur:Re(r||{})},l=(0,o.Z)({},r,i);return(0,o.Z)({tabIndex:q,"aria-labelledby":t,"aria-orientation":D,"aria-valuemax":H(T),"aria-valuemin":H(I),name:O,type:"range",min:e.min,max:e.max,step:null!=(n=e.step)?n:void 0,disabled:a},l,{style:(0,o.Z)({},Z,{direction:c?"rtl":"ltr",width:"100%",height:"100%"})})},getRootProps:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},t={onMouseDown:Ke(e||{})},n=(0,o.Z)({},e,t);return(0,o.Z)({ref:Ee},n)},getThumbProps:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},t={onMouseOver:Ye(e||{}),onMouseLeave:He(e||{})};return(0,o.Z)({},e,t)},marks:he,open:ne,range:me,trackLeap:Be,trackOffset:De,values:pe}}var j=n(2065),T=n(1046),M=n(7630),I=n(3967),O=function(e){return!e||!(0,c.Z)(e)},V=n(4036),F=n(5878),K=n(1217);function D(e){return(0,K.Z)("MuiSlider",e)}var B=(0,F.Z)("MuiSlider",["root","active","colorPrimary","colorSecondary","disabled","dragging","focusVisible","mark","markActive","marked","markLabel","markLabelActive","rail","sizeSmall","thumb","thumbColorPrimary","thumbColorSecondary","track","trackInverted","trackFalse","thumbSizeSmall","valueLabel","valueLabelOpen","valueLabelCircle","valueLabelLabel","vertical"]),Y=n(184);var H=["aria-label","aria-valuetext","aria-labelledby","component","components","componentsProps","color","classes","className","disableSwap","disabled","getAriaLabel","getAriaValueText","marks","max","min","name","onChange","onChangeCommitted","orientation","size","step","scale","slotProps","slots","tabIndex","track","value","valueLabelDisplay","valueLabelFormat"];function X(e){return e}var _=(0,M.ZP)("span",{name:"MuiSlider",slot:"Root",overridesResolver:function(e,t){var n=e.ownerState;return[t.root,t["color".concat((0,V.Z)(n.color))],"medium"!==n.size&&t["size".concat((0,V.Z)(n.size))],n.marked&&t.marked,"vertical"===n.orientation&&t.vertical,"inverted"===n.track&&t.trackInverted,!1===n.track&&t.trackFalse]}})((function(e){var t,n=e.theme,a=e.ownerState;return(0,o.Z)({borderRadius:12,boxSizing:"content-box",display:"inline-block",position:"relative",cursor:"pointer",touchAction:"none",color:(n.vars||n).palette[a.color].main,WebkitTapHighlightColor:"transparent"},"horizontal"===a.orientation&&(0,o.Z)({height:4,width:"100%",padding:"13px 0","@media (pointer: coarse)":{padding:"20px 0"}},"small"===a.size&&{height:2},a.marked&&{marginBottom:20}),"vertical"===a.orientation&&(0,o.Z)({height:"100%",width:4,padding:"0 13px","@media (pointer: coarse)":{padding:"0 20px"}},"small"===a.size&&{width:2},a.marked&&{marginRight:44}),(t={"@media print":{colorAdjust:"exact"}},(0,r.Z)(t,"&.".concat(B.disabled),{pointerEvents:"none",cursor:"default",color:(n.vars||n).palette.grey[400]}),(0,r.Z)(t,"&.".concat(B.dragging),(0,r.Z)({},"& .".concat(B.thumb,", & .").concat(B.track),{transition:"none"})),t))})),q=(0,M.ZP)("span",{name:"MuiSlider",slot:"Rail",overridesResolver:function(e,t){return t.rail}})((function(e){var t=e.ownerState;return(0,o.Z)({display:"block",position:"absolute",borderRadius:"inherit",backgroundColor:"currentColor",opacity:.38},"horizontal"===t.orientation&&{width:"100%",height:"inherit",top:"50%",transform:"translateY(-50%)"},"vertical"===t.orientation&&{height:"100%",width:"inherit",left:"50%",transform:"translateX(-50%)"},"inverted"===t.track&&{opacity:1})})),W=(0,M.ZP)("span",{name:"MuiSlider",slot:"Track",overridesResolver:function(e,t){return t.track}})((function(e){var t=e.theme,n=e.ownerState,r="light"===t.palette.mode?(0,j.$n)(t.palette[n.color].main,.62):(0,j._j)(t.palette[n.color].main,.5);return(0,o.Z)({display:"block",position:"absolute",borderRadius:"inherit",border:"1px solid currentColor",backgroundColor:"currentColor",transition:t.transitions.create(["left","width","bottom","height"],{duration:t.transitions.duration.shortest})},"small"===n.size&&{border:"none"},"horizontal"===n.orientation&&{height:"inherit",top:"50%",transform:"translateY(-50%)"},"vertical"===n.orientation&&{width:"inherit",left:"50%",transform:"translateX(-50%)"},!1===n.track&&{display:"none"},"inverted"===n.track&&{backgroundColor:t.vars?t.vars.palette.Slider["".concat(n.color,"Track")]:r,borderColor:t.vars?t.vars.palette.Slider["".concat(n.color,"Track")]:r})})),U=(0,M.ZP)("span",{name:"MuiSlider",slot:"Thumb",overridesResolver:function(e,t){var n=e.ownerState;return[t.thumb,t["thumbColor".concat((0,V.Z)(n.color))],"medium"!==n.size&&t["thumbSize".concat((0,V.Z)(n.size))]]}})((function(e){var t,n=e.theme,a=e.ownerState;return(0,o.Z)({position:"absolute",width:20,height:20,boxSizing:"border-box",borderRadius:"50%",outline:0,backgroundColor:"currentColor",display:"flex",alignItems:"center",justifyContent:"center",transition:n.transitions.create(["box-shadow","left","bottom"],{duration:n.transitions.duration.shortest})},"small"===a.size&&{width:12,height:12},"horizontal"===a.orientation&&{top:"50%",transform:"translate(-50%, -50%)"},"vertical"===a.orientation&&{left:"50%",transform:"translate(-50%, 50%)"},(t={"&:before":(0,o.Z)({position:"absolute",content:'""',borderRadius:"inherit",width:"100%",height:"100%",boxShadow:(n.vars||n).shadows[2]},"small"===a.size&&{boxShadow:"none"}),"&::after":{position:"absolute",content:'""',borderRadius:"50%",width:42,height:42,top:"50%",left:"50%",transform:"translate(-50%, -50%)"}},(0,r.Z)(t,"&:hover, &.".concat(B.focusVisible),{boxShadow:"0px 0px 0px 8px ".concat(n.vars?"rgba(".concat(n.vars.palette[a.color].mainChannel," / 0.16)"):(0,j.Fq)(n.palette[a.color].main,.16)),"@media (hover: none)":{boxShadow:"none"}}),(0,r.Z)(t,"&.".concat(B.active),{boxShadow:"0px 0px 0px 14px ".concat(n.vars?"rgba(".concat(n.vars.palette[a.color].mainChannel," / 0.16)"):(0,j.Fq)(n.palette[a.color].main,.16))}),(0,r.Z)(t,"&.".concat(B.disabled),{"&:hover":{boxShadow:"none"}}),t))})),$=(0,M.ZP)((function(e){var t=e.children,n=e.className,r=e.value,a=function(e){var t=e.open;return{offset:(0,l.Z)(t&&B.valueLabelOpen),circle:B.valueLabelCircle,label:B.valueLabelLabel}}(e);return t?i.cloneElement(t,{className:(0,l.Z)(t.props.className)},(0,Y.jsxs)(i.Fragment,{children:[t.props.children,(0,Y.jsx)("span",{className:(0,l.Z)(a.offset,n),"aria-hidden":!0,children:(0,Y.jsx)("span",{className:a.circle,children:(0,Y.jsx)("span",{className:a.label,children:r})})})]})):null}),{name:"MuiSlider",slot:"ValueLabel",overridesResolver:function(e,t){return t.valueLabel}})((function(e){var t,n=e.theme,a=e.ownerState;return(0,o.Z)((t={},(0,r.Z)(t,"&.".concat(B.valueLabelOpen),{transform:"translateY(-100%) scale(1)"}),(0,r.Z)(t,"zIndex",1),(0,r.Z)(t,"whiteSpace","nowrap"),t),n.typography.body2,{fontWeight:500,transition:n.transitions.create(["transform"],{duration:n.transitions.duration.shortest}),transform:"translateY(-100%) scale(0)",position:"absolute",backgroundColor:(n.vars||n).palette.grey[600],borderRadius:2,color:(n.vars||n).palette.common.white,display:"flex",alignItems:"center",justifyContent:"center",padding:"0.25rem 0.75rem"},"horizontal"===a.orientation&&{top:"-10px",transformOrigin:"bottom center","&:before":{position:"absolute",content:'""',width:8,height:8,transform:"translate(-50%, 50%) rotate(45deg)",backgroundColor:"inherit",bottom:0,left:"50%"}},"vertical"===a.orientation&&{right:"30px",top:"24px",transformOrigin:"right center","&:before":{position:"absolute",content:'""',width:8,height:8,transform:"translate(-50%, 50%) rotate(45deg)",backgroundColor:"inherit",right:"-20%",top:"25%"}},"small"===a.size&&{fontSize:n.typography.pxToRem(12),padding:"0.25rem 0.5rem"})})),G=(0,M.ZP)("span",{name:"MuiSlider",slot:"Mark",shouldForwardProp:function(e){return(0,M.Dz)(e)&&"markActive"!==e},overridesResolver:function(e,t){var n=e.markActive;return[t.mark,n&&t.markActive]}})((function(e){var t=e.theme,n=e.ownerState,r=e.markActive;return(0,o.Z)({position:"absolute",width:2,height:2,borderRadius:1,backgroundColor:"currentColor"},"horizontal"===n.orientation&&{top:"50%",transform:"translate(-1px, -50%)"},"vertical"===n.orientation&&{left:"50%",transform:"translate(-50%, 1px)"},r&&{backgroundColor:(t.vars||t).palette.background.paper,opacity:.8})})),J=(0,M.ZP)("span",{name:"MuiSlider",slot:"MarkLabel",shouldForwardProp:function(e){return(0,M.Dz)(e)&&"markLabelActive"!==e},overridesResolver:function(e,t){return t.markLabel}})((function(e){var t=e.theme,n=e.ownerState,r=e.markLabelActive;return(0,o.Z)({},t.typography.body2,{color:(t.vars||t).palette.text.secondary,position:"absolute",whiteSpace:"nowrap"},"horizontal"===n.orientation&&{top:30,transform:"translateX(-50%)","@media (pointer: coarse)":{top:40}},"vertical"===n.orientation&&{left:36,transform:"translateY(50%)","@media (pointer: coarse)":{left:44}},r&&{color:(t.vars||t).palette.text.primary})})),Q=function(e){return e.children},ee=i.forwardRef((function(e,t){var n,r,d,v,f,m,p,h,b,x,Z,g,y,k,w,N,P,C,L,E,A,R,j,M,F=(0,T.Z)({props:e,name:"MuiSlider"}),K="rtl"===(0,I.Z)().direction,B=F["aria-label"],ee=F["aria-valuetext"],te=F["aria-labelledby"],ne=F.component,re=void 0===ne?"span":ne,ae=F.components,oe=void 0===ae?{}:ae,ie=F.componentsProps,le=void 0===ie?{}:ie,se=F.color,ue=void 0===se?"primary":se,ce=F.classes,de=F.className,ve=F.disableSwap,fe=void 0!==ve&&ve,me=F.disabled,pe=void 0!==me&&me,he=F.getAriaLabel,be=F.getAriaValueText,xe=F.marks,Ze=void 0!==xe&&xe,ge=F.max,ye=void 0===ge?100:ge,ke=F.min,we=void 0===ke?0:ke,Se=F.orientation,Ne=void 0===Se?"horizontal":Se,Pe=F.size,Ce=void 0===Pe?"medium":Pe,Le=F.step,Ee=void 0===Le?1:Le,Ae=F.scale,Re=void 0===Ae?X:Ae,ze=F.slotProps,je=F.slots,Te=F.track,Me=void 0===Te?"normal":Te,Ie=F.valueLabelDisplay,Oe=void 0===Ie?"off":Ie,Ve=F.valueLabelFormat,Fe=void 0===Ve?X:Ve,Ke=(0,a.Z)(F,H),De=(0,o.Z)({},F,{isRtl:K,max:ye,min:we,classes:ce,disabled:pe,disableSwap:fe,orientation:Ne,marks:Ze,color:ue,size:Ce,step:Ee,scale:Re,track:Me,valueLabelDisplay:Oe,valueLabelFormat:Fe}),Be=z((0,o.Z)({},De,{ref:t})),Ye=Be.axisProps,He=Be.getRootProps,Xe=Be.getHiddenInputProps,_e=Be.getThumbProps,qe=Be.open,We=Be.active,Ue=Be.axis,$e=Be.focusedThumbIndex,Ge=Be.range,Je=Be.dragging,Qe=Be.marks,et=Be.values,tt=Be.trackOffset,nt=Be.trackLeap;De.marked=Qe.length>0&&Qe.some((function(e){return e.label})),De.dragging=Je,De.focusedThumbIndex=$e;var rt=function(e){var t=e.disabled,n=e.dragging,r=e.marked,a=e.orientation,o=e.track,i=e.classes,l=e.color,u=e.size,c={root:["root",t&&"disabled",n&&"dragging",r&&"marked","vertical"===a&&"vertical","inverted"===o&&"trackInverted",!1===o&&"trackFalse",l&&"color".concat((0,V.Z)(l)),u&&"size".concat((0,V.Z)(u))],rail:["rail"],track:["track"],mark:["mark"],markActive:["markActive"],markLabel:["markLabel"],markLabelActive:["markLabelActive"],valueLabel:["valueLabel"],thumb:["thumb",t&&"disabled",u&&"thumbSize".concat((0,V.Z)(u)),l&&"thumbColor".concat((0,V.Z)(l))],active:["active"],disabled:["disabled"],focusVisible:["focusVisible"]};return(0,s.Z)(c,D,i)}(De),at=null!=(n=null!=(r=null==je?void 0:je.root)?r:oe.Root)?n:_,ot=null!=(d=null!=(v=null==je?void 0:je.rail)?v:oe.Rail)?d:q,it=null!=(f=null!=(m=null==je?void 0:je.track)?m:oe.Track)?f:W,lt=null!=(p=null!=(h=null==je?void 0:je.thumb)?h:oe.Thumb)?p:U,st=null!=(b=null!=(x=null==je?void 0:je.valueLabel)?x:oe.ValueLabel)?b:$,ut=null!=(Z=null!=(g=null==je?void 0:je.mark)?g:oe.Mark)?Z:G,ct=null!=(y=null!=(k=null==je?void 0:je.markLabel)?k:oe.MarkLabel)?y:J,dt=null!=(w=null!=(N=null==je?void 0:je.input)?N:oe.Input)?w:"input",vt=null!=(P=null==ze?void 0:ze.root)?P:le.root,ft=null!=(C=null==ze?void 0:ze.rail)?C:le.rail,mt=null!=(L=null==ze?void 0:ze.track)?L:le.track,pt=null!=(E=null==ze?void 0:ze.thumb)?E:le.thumb,ht=null!=(A=null==ze?void 0:ze.valueLabel)?A:le.valueLabel,bt=null!=(R=null==ze?void 0:ze.mark)?R:le.mark,xt=null!=(j=null==ze?void 0:ze.markLabel)?j:le.markLabel,Zt=null!=(M=null==ze?void 0:ze.input)?M:le.input,gt=(0,u.Z)({elementType:at,getSlotProps:He,externalSlotProps:vt,externalForwardedProps:Ke,additionalProps:(0,o.Z)({},O(at)&&{as:re}),ownerState:(0,o.Z)({},De,null==vt?void 0:vt.ownerState),className:[rt.root,de]}),yt=(0,u.Z)({elementType:ot,externalSlotProps:ft,ownerState:De,className:rt.rail}),kt=(0,u.Z)({elementType:it,externalSlotProps:mt,additionalProps:{style:(0,o.Z)({},Ye[Ue].offset(tt),Ye[Ue].leap(nt))},ownerState:(0,o.Z)({},De,null==mt?void 0:mt.ownerState),className:rt.track}),wt=(0,u.Z)({elementType:lt,getSlotProps:_e,externalSlotProps:pt,ownerState:(0,o.Z)({},De,null==pt?void 0:pt.ownerState),className:rt.thumb}),St=(0,u.Z)({elementType:st,externalSlotProps:ht,ownerState:(0,o.Z)({},De,null==ht?void 0:ht.ownerState),className:rt.valueLabel}),Nt=(0,u.Z)({elementType:ut,externalSlotProps:bt,ownerState:De,className:rt.mark}),Pt=(0,u.Z)({elementType:ct,externalSlotProps:xt,ownerState:De,className:rt.markLabel}),Ct=(0,u.Z)({elementType:dt,getSlotProps:Xe,externalSlotProps:Zt,ownerState:De});return(0,Y.jsxs)(at,(0,o.Z)({},gt,{children:[(0,Y.jsx)(ot,(0,o.Z)({},yt)),(0,Y.jsx)(it,(0,o.Z)({},kt)),Qe.filter((function(e){return e.value>=we&&e.value<=ye})).map((function(e,t){var n,r=S(e.value,we,ye),a=Ye[Ue].offset(r);return n=!1===Me?-1!==et.indexOf(e.value):"normal"===Me&&(Ge?e.value>=et[0]&&e.value<=et[et.length-1]:e.value<=et[0])||"inverted"===Me&&(Ge?e.value<=et[0]||e.value>=et[et.length-1]:e.value>=et[0]),(0,Y.jsxs)(i.Fragment,{children:[(0,Y.jsx)(ut,(0,o.Z)({"data-index":t},Nt,!(0,c.Z)(ut)&&{markActive:n},{style:(0,o.Z)({},a,Nt.style),className:(0,l.Z)(Nt.className,n&&rt.markActive)})),null!=e.label?(0,Y.jsx)(ct,(0,o.Z)({"aria-hidden":!0,"data-index":t},Pt,!(0,c.Z)(ct)&&{markLabelActive:n},{style:(0,o.Z)({},a,Pt.style),className:(0,l.Z)(rt.markLabel,Pt.className,n&&rt.markLabelActive),children:e.label})):null]},t)})),et.map((function(e,t){var n=S(e,we,ye),r=Ye[Ue].offset(n),a="off"===Oe?Q:st;return(0,Y.jsx)(a,(0,o.Z)({},!(0,c.Z)(a)&&{valueLabelFormat:Fe,valueLabelDisplay:Oe,value:"function"===typeof Fe?Fe(Re(e),t):Fe,index:t,open:qe===t||We===t||"on"===Oe,disabled:pe},St,{children:(0,Y.jsx)(lt,(0,o.Z)({"data-index":t},wt,{className:(0,l.Z)(rt.thumb,wt.className,We===t&&rt.active,$e===t&&rt.focusVisible),style:(0,o.Z)({},r,{pointerEvents:fe&&We!==t?"none":void 0},wt.style),children:(0,Y.jsx)(dt,(0,o.Z)({"data-index":t,"aria-label":he?he(t):B,"aria-valuenow":Re(e),"aria-labelledby":te,"aria-valuetext":be?be(Re(e),t):ee,value:et[t]},Ct))}))}),t)}))]}))})),te=ee},3967:function(e,t,n){n.d(t,{Z:function(){return o}});n(2791);var r=n(886),a=n(6482);function o(){return(0,r.Z)(a.Z)}},9723:function(e,t,n){function r(e){return e&&e.ownerDocument||document}n.d(t,{Z:function(){return r}})},8959:function(e,t,n){n.d(t,{Z:function(){return o}});var r=n(885),a=n(2791);function o(e){var t=e.controlled,n=e.default,o=(e.name,e.state,a.useRef(void 0!==t).current),i=a.useState(n),l=(0,r.Z)(i,2),s=l[0],u=l[1];return[o?t:s,a.useCallback((function(e){o||u(e)}),[])]}},9764:function(e,t,n){n.d(t,{Z:function(){return U}});var r=n(1413),a=n(5987),o=n(1694),i=n.n(o),l=n(2791),s=n(239),u=n(162),c=n(4942),d=n(5427),v=n(6752),f=n(1380);var m,p=function(){for(var e=arguments.length,t=new Array(e),n=0;n<e;n++)t[n]=arguments[n];return t.filter((function(e){return null!=e})).reduce((function(e,t){if("function"!==typeof t)throw new Error("Invalid Argument Type, must only provide functions, undefined, or null.");return null===e?t:function(){for(var n=arguments.length,r=new Array(n),a=0;a<n;a++)r[a]=arguments[a];e.apply(this,r),t.apply(this,r)}}),null)},h=n(7202),b=n(4083),x=n(184),Z=["onEnter","onEntering","onEntered","onExit","onExiting","className","children","dimension","getDimensionValue"],g={height:["marginTop","marginBottom"],width:["marginLeft","marginRight"]};function y(e,t){var n=t["offset".concat(e[0].toUpperCase()).concat(e.slice(1))],r=g[e];return n+parseInt((0,d.Z)(t,r[0]),10)+parseInt((0,d.Z)(t,r[1]),10)}var k=(m={},(0,c.Z)(m,v.Wj,"collapse"),(0,c.Z)(m,v.Ix,"collapsing"),(0,c.Z)(m,v.d0,"collapsing"),(0,c.Z)(m,v.cn,"collapse show"),m),w={in:!1,timeout:300,mountOnEnter:!1,unmountOnExit:!1,appear:!1,getDimensionValue:y},S=l.forwardRef((function(e,t){var n=e.onEnter,o=e.onEntering,s=e.onEntered,u=e.onExit,c=e.onExiting,d=e.className,v=e.children,m=e.dimension,g=void 0===m?"height":m,w=e.getDimensionValue,S=void 0===w?y:w,N=(0,a.Z)(e,Z),P="function"===typeof g?g():g,C=(0,l.useMemo)((function(){return p((function(e){e.style[P]="0"}),n)}),[P,n]),L=(0,l.useMemo)((function(){return p((function(e){var t="scroll".concat(P[0].toUpperCase()).concat(P.slice(1));e.style[P]="".concat(e[t],"px")}),o)}),[P,o]),E=(0,l.useMemo)((function(){return p((function(e){e.style[P]=null}),s)}),[P,s]),A=(0,l.useMemo)((function(){return p((function(e){e.style[P]="".concat(S(P,e),"px"),(0,h.Z)(e)}),u)}),[u,S,P]),R=(0,l.useMemo)((function(){return p((function(e){e.style[P]=null}),c)}),[P,c]);return(0,x.jsx)(b.Z,(0,r.Z)((0,r.Z)({ref:t,addEndListener:f.Z},N),{},{"aria-expanded":N.role?N.in:null,onEnter:C,onEntering:L,onEntered:E,onExit:A,onExiting:R,childRef:v.ref,children:function(e,t){return l.cloneElement(v,(0,r.Z)((0,r.Z)({},t),{},{className:i()(d,v.props.className,k[e],"width"===P&&"collapse-horizontal")}))}}))}));S.defaultProps=w;var N=S;function P(e,t){return Array.isArray(e)?e.includes(t):e===t}var C=l.createContext({});C.displayName="AccordionContext";var L=C,E=["as","bsPrefix","className","children","eventKey"],A=l.forwardRef((function(e,t){var n=e.as,o=void 0===n?"div":n,s=e.bsPrefix,c=e.className,d=e.children,v=e.eventKey,f=(0,a.Z)(e,E),m=(0,l.useContext)(L).activeEventKey;return s=(0,u.vE)(s,"accordion-collapse"),(0,x.jsx)(N,(0,r.Z)((0,r.Z)({ref:t,in:P(m,v)},f),{},{className:i()(c,s),children:(0,x.jsx)(o,{children:l.Children.only(d)})}))}));A.displayName="AccordionCollapse";var R=A,z=l.createContext({eventKey:""});z.displayName="AccordionItemContext";var j=z,T=["as","bsPrefix","className"],M=l.forwardRef((function(e,t){var n=e.as,o=void 0===n?"div":n,s=e.bsPrefix,c=e.className,d=(0,a.Z)(e,T);s=(0,u.vE)(s,"accordion-body");var v=(0,l.useContext)(j).eventKey;return(0,x.jsx)(R,{eventKey:v,children:(0,x.jsx)(o,(0,r.Z)((0,r.Z)({ref:t},d),{},{className:i()(c,s)}))})}));M.displayName="AccordionBody";var I=M,O=n(2982),V=["as","bsPrefix","className","onClick"];var F=l.forwardRef((function(e,t){var n=e.as,o=void 0===n?"button":n,s=e.bsPrefix,c=e.className,d=e.onClick,v=(0,a.Z)(e,V);s=(0,u.vE)(s,"accordion-button");var f=(0,l.useContext)(j).eventKey,m=function(e,t){var n=(0,l.useContext)(L),r=n.activeEventKey,a=n.onSelect,o=n.alwaysOpen;return function(n){var i=e===r?null:e;o&&(i=Array.isArray(r)?r.includes(e)?r.filter((function(t){return t!==e})):[].concat((0,O.Z)(r),[e]):[e]),null==a||a(i,n),null==t||t(n)}}(f,d),p=(0,l.useContext)(L).activeEventKey;return"button"===o&&(v.type="button"),(0,x.jsx)(o,(0,r.Z)((0,r.Z)({ref:t,onClick:m},v),{},{"aria-expanded":f===p,className:i()(c,s,!P(p,f)&&"collapsed")}))}));F.displayName="AccordionButton";var K=F,D=["as","bsPrefix","className","children","onClick"],B=l.forwardRef((function(e,t){var n=e.as,o=void 0===n?"h2":n,l=e.bsPrefix,s=e.className,c=e.children,d=e.onClick,v=(0,a.Z)(e,D);return l=(0,u.vE)(l,"accordion-header"),(0,x.jsx)(o,(0,r.Z)((0,r.Z)({ref:t},v),{},{className:i()(s,l),children:(0,x.jsx)(K,{onClick:d,children:c})}))}));B.displayName="AccordionHeader";var Y=B,H=["as","bsPrefix","className","eventKey"],X=l.forwardRef((function(e,t){var n=e.as,o=void 0===n?"div":n,s=e.bsPrefix,c=e.className,d=e.eventKey,v=(0,a.Z)(e,H);s=(0,u.vE)(s,"accordion-item");var f=(0,l.useMemo)((function(){return{eventKey:d}}),[d]);return(0,x.jsx)(j.Provider,{value:f,children:(0,x.jsx)(o,(0,r.Z)((0,r.Z)({ref:t},v),{},{className:i()(c,s)}))})}));X.displayName="AccordionItem";var _=X,q=["as","activeKey","bsPrefix","className","onSelect","flush","alwaysOpen"],W=l.forwardRef((function(e,t){var n=(0,s.Ch)(e,{activeKey:"onSelect"}),o=n.as,c=void 0===o?"div":o,d=n.activeKey,v=n.bsPrefix,f=n.className,m=n.onSelect,p=n.flush,h=n.alwaysOpen,b=(0,a.Z)(n,q),Z=(0,u.vE)(v,"accordion"),g=(0,l.useMemo)((function(){return{activeEventKey:d,onSelect:m,alwaysOpen:h}}),[d,m,h]);return(0,x.jsx)(L.Provider,{value:g,children:(0,x.jsx)(c,(0,r.Z)((0,r.Z)({ref:t},b),{},{className:i()(f,Z,p&&"".concat(Z,"-flush"))}))})}));W.displayName="Accordion";var U=Object.assign(W,{Button:K,Collapse:R,Item:_,Header:Y,Body:I})}}]);
//# sourceMappingURL=2071.17162aa0.chunk.js.map