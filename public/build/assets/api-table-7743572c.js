function r(e,t){let l=document.getElementById(e).value;l&&(l=l.trim()),t?l&&l.length>0?document.getElementById("curl_"+e).innerHTML="&"+e+"="+encodeURIComponent(l):document.getElementById("curl_"+e).innerHTML="":document.getElementById("curl_"+e).innerHTML=l}function m(e,t){r(e,t),document.getElementById(e).addEventListener("input",function(){r(e,t)},!1)}function i(e){const t=document.getElementById("failure_tip");t&&e&&e.length>0?t.innerHTML="<p>"+e+"</p>":t.innerHTML=""}function y(e,t){for(const o of Object.keys(e)){let n=e[o];m(o,n||!1)}document.getElementById("at-action-button").addEventListener("click",async function(){let o={};for(const n of Object.keys(e)){let a=document.getElementById(n).value.trim();o[n]=a}try{const n=await t(o);document.getElementById("result").innerHTML=n,i()}catch(n){document.getElementById("result").innerHTML=n,n.message==="Failed to fetch"&&i("🚫 Request blocked. Disable your ad blocker and retry.")}})}document.getElementById("deployment_key").value=localStorage.getItem("deployment_key")||"";document.getElementById("curl_url").textContent="https://api.lab.amplitude.com/v1/vardata?";y({deployment_key:!1,user_id:!0,device_id:!0,flag_key:!0,context:!0},async function(e){const t=e.deployment_key,l=e.user_id,o=e.device_id,n=e.flag_key,a=e.context;localStorage.setItem("deployment_key",t);let c=document.getElementById("server-zone").value==="US"?"https://api.lab.amplitude.com/v1/vardata?":"https://api.lab.eu.amplitude.com/v1/vardata?";l&&l.length>0&&(c+="&user_id="+l),o&&o.length>0&&(c+="&device_id="+o),n&&n.length>0&&(c+="&flag_key="+n),a&&a.length>0&&(c+="&context="+a);const u=await fetch(c,{headers:{Authorization:"Api-Key "+t}});if(u.status!=200){const s=await u.text();throw Error(u.status+": "+s)}const d=await u.json();return JSON.stringify(d,null,2)});
