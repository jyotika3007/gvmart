"use strict";(self.webpackChunkflone_react=self.webpackChunkflone_react||[]).push([[73],{73:function(e,s,t){t.r(s);var r=t(885),a=t(2791),i=(t(6443),t(9434)),n=t(7689),l=t(1770),o=t(3695),d=t(5378),c=t(2484),u=t(3413),m=t(335),x=t(4427),h=t(828),p=t(184);s.default=function(e){e.location;var s=(0,a.useState)("three-column"),t=(0,r.Z)(s,2),v=t[0],g=t[1],f=(0,a.useState)(""),j=(0,r.Z)(f,2),b=j[0],S=j[1],y=(0,a.useState)(""),Z=(0,r.Z)(y,2),N=Z[0],P=Z[1],w=(0,a.useState)(""),C=(0,r.Z)(w,2),R=C[0],k=C[1],L=(0,a.useState)(""),_=(0,r.Z)(L,2),T=_[0],z=_[1],B=(0,a.useState)(0),E=(0,r.Z)(B,2),F=E[0],H=(E[1],(0,a.useState)(1)),I=(0,r.Z)(H,2),V=(I[0],I[1],(0,a.useState)([])),A=(0,r.Z)(V,2),D=A[0],K=A[1],W=(0,a.useState)([]),q=(0,r.Z)(W,2),O=q[0],U=q[1],X=(0,a.useState)([]),G=(0,r.Z)(X,2),J=(G[0],G[1]),M=(0,i.v9)((function(e){return e.product})).products,Q=(0,i.v9)((function(e){return e.mainProductReducer})),Y=(0,n.TH)().pathname,$=(0,n.UO)().id;console.log(null===Q||void 0===Q?void 0:Q.categoryProduct,"iddd");var ee=(0,i.I0)();return(0,a.useEffect)((function(){var e=(0,l.LB)(M,b,N),s=(0,l.LB)(e,R,T);J(e=s),K(e.slice(9,17))}),[F,M,b,N,R,T]),(0,a.useEffect)((function(){null!==Q&&void 0!==Q&&Q.categoryProduct&&U(null===Q||void 0===Q?void 0:Q.categoryProduct)}),[null===Q||void 0===Q?void 0:Q.categoryProduct]),(0,a.useEffect)((function(){null!=$&&ee((0,h.DP)($))}),[$]),console.log($,"iddd"),(0,p.jsxs)(a.Fragment,{children:[(0,p.jsx)(o.Z,{titleTemplate:"Shop Page",description:"Shop page of flone react minimalist eCommerce template."}),(0,p.jsxs)(d.Z,{headerTop:"visible",children:[(0,p.jsx)(c.Z,{pages:[{label:"Home",path:"/store/build/"},{label:"Shop",path:"/store/build"+Y}]}),(0,p.jsx)("div",{className:"shop-area pt-95 pb-100",children:(0,p.jsx)("div",{className:"container-fluid",children:(0,p.jsxs)("div",{className:"row",children:[(0,p.jsx)("div",{className:"col-lg-3 order-2 order-lg-1",children:(0,p.jsx)(u.Z,{products:M,getSortParams:function(e,s){S(e),P(s)},sideSpaceClass:"mr-30"})}),(0,p.jsxs)("div",{className:"col-lg-9 order-1 order-lg-2",children:[(0,p.jsx)(m.Z,{getLayout:function(e){g(e)},getFilterSortParams:function(e,s){k(e),z(s)},productCount:M.length,sortedProductCount:D.length}),(0,p.jsx)(x.Z,{layout:v,products:O})]})]})})})]})]})}},3413:function(e,s,t){t.d(s,{Z:function(){return b}});var r=t(8182),a=t(1770),i=t(184),n=function(){return(0,i.jsxs)("div",{className:"sidebar-widget",children:[(0,i.jsx)("h4",{className:"pro-sidebar-title",children:"Search "}),(0,i.jsx)("div",{className:"pro-sidebar-search mb-50 mt-25",children:(0,i.jsxs)("form",{className:"pro-sidebar-search-form",action:"#",children:[(0,i.jsx)("input",{type:"text",placeholder:"Search here..."}),(0,i.jsx)("button",{children:(0,i.jsx)("i",{className:"pe-7s-search"})})]})})]})},l=t(9764),o=function(e){var s=e.categories;e.getSortParams;return(0,i.jsxs)("div",{className:"sidebar-widget",children:[(0,i.jsx)("h4",{className:"pro-sidebar-title",children:"Categories "}),(0,i.jsx)(l.Z,{defaultActiveKey:"0",children:s.map((function(e,s){var t;return(0,i.jsxs)(l.Z.Item,{eventKey:s,children:[(0,i.jsx)(l.Z.Header,{className:"unique",children:e.category_name}),(0,i.jsx)(l.Z.Body,{children:null===e||void 0===e||null===(t=e.child)||void 0===t?void 0:t.map((function(e){return(0,i.jsx)(i.Fragment,{children:(0,i.jsxs)("div",{style:{display:"flex",alignItems:"center",gap:"10px",textAlign:"center"},children:[(0,i.jsx)("input",{type:"checkbox",style:{width:"12px",marginTop:"-10px"}}),(0,i.jsx)("div",{style:{fontSize:"18px",marginBottom:"10px"},children:null===e||void 0===e?void 0:e.category_name})]})})}))})]})}))})]})},d=function(e){var s=e.colors;return(0,i.jsxs)("div",{className:"sidebar-widget mt-50",children:[(0,i.jsx)("h4",{className:"pro-sidebar-title",children:"Color "}),(0,i.jsx)("div",{className:"sidebar-widget-list mt-20",children:(0,i.jsx)("div",{style:{display:"flex",gap:"10px",flexWrap:"wrap"},children:null===s||void 0===s?void 0:s.map((function(e){return(0,i.jsx)("div",{style:{backgroundColor:e.code,height:"20px",width:"20px",borderRadius:"50%"}})}))})})]})},c=t(1918),u=function(e){var s=e.sizes;e.getSortParams;return(0,i.jsxs)("div",{className:"sidebar-widget mt-40",children:[(0,i.jsx)("h4",{className:"pro-sidebar-title",children:"Storage"}),(0,i.jsx)("div",{className:"sidebar-widget-list mt-20",children:(0,i.jsx)("div",{style:{display:"flex",gap:"10px",flexWrap:"wrap"},children:null===s||void 0===s?void 0:s.map((function(e){return(0,i.jsx)(c.Z,{label:null===e||void 0===e?void 0:e.value})}))})})]})},m=t(885),x=t(2791),h=t(6747),p=t(3963),v=function(e){var s=e.min,t=e.max,r=(e.onChange,x.useState([1e4,3e5])),a=(0,m.Z)(r,2),n=a[0],l=a[1];return(0,i.jsxs)(h.Z,{sx:{width:300},children:[(0,i.jsx)(p.ZP,{getAriaLabel:function(){return"Temperature range"},value:n,onChange:function(e,s){l(s)},valueLabelDisplay:"auto",min:1e4,max:3e5}),(0,i.jsxs)("div",{style:{width:"100%",display:"flex",justifyContent:"space-between"},children:[(0,i.jsx)("span",{children:s}),(0,i.jsx)("span",{children:t})]})]})},g=function(e){var s=e.min,t=e.max;e.tags,e.getSortParams;return(0,i.jsxs)("div",{className:"sidebar-widget mt-50",children:[(0,i.jsx)("h4",{className:"pro-sidebar-title",children:"Price"}),(0,i.jsx)("div",{className:"sidebar-widget-tag mt-25",children:(0,i.jsx)(v,{min:s,max:t})})]})},f=t(828),j=t(9434),b=function(e){var s,t,l,c,m=e.products,h=e.getSortParams,p=e.sideSpaceClass,v=((0,a.uX)(m),(0,a.mF)(m),(0,a.l9)(m),(0,a.ku)(m)),b=(0,j.v9)((function(e){return e.mainProductReducer})),S=(0,j.v9)((function(e){return e.HomeReducer})),y=(0,j.I0)();return console.log(S.categoriesListRes,"variantt"),(0,x.useEffect)((function(){y((0,f.z5)())}),[]),(0,i.jsxs)("div",{className:(0,r.Z)("sidebar-style",p),children:[(0,i.jsx)(n,{}),(0,i.jsx)(o,{categories:S.categoriesListRes,getSortParams:h}),(0,i.jsx)(g,{min:null===(s=b.VariantsRes)||void 0===s?void 0:s.min_price,max:null===(t=b.VariantsRes)||void 0===t?void 0:t.max_price,tags:v,getSortParams:h}),(0,i.jsx)(d,{colors:null===(l=b.VariantsRes)||void 0===l?void 0:l.colors,getSortParams:h}),(0,i.jsx)(u,{sizes:null===(c=b.VariantsRes)||void 0===c?void 0:c.storage,getSortParams:h})]})}}}]);
//# sourceMappingURL=73.b6ad295e.chunk.js.map