<?php

# No direct access
$secureSrcClassName  = 'WCFE\Modules\Editor\Model\EmergencyRestore';
( class_exists( $secureSrcClassName ) && ( get_class( $this ) == $secureSrcClassName ) ) or die( 'Access Denied' );

$data = array();

$data[ 'secureKey' ] 	= '92d0879d6c841180f3a38d0f9327c5bc';
$data[ 'backupFileHash' ] 	= 'f50bae0759789b17eeba781508334c9f';

$data[ 'absPath' ] 	= 'C:\Users\Shubhenud\PhpstormProjects\wordpress';
$data[ 'contentDir' ] 	= 'C:\Users\Shubhenud\PhpstormProjects\wordpress/wp-content\wcfe-ca44c41a1e7ff7a3d0a059db9f0c5a31';

$data[ 'timeCreated' ] 	= 1589983370;

$data[ 'privateKey' ] = 'g$W2g!qfLZKXXA(D.p3:I>z#<tP%|IW1%ltC#)6,o)x`H3~fDVfHHZ/OVU@o1={9,e6G}A6PQ^3~NR<u8z#m^-C=wqn*]sP>{W7/Waqz(ZRprf-_NN?5Gc(32P8%NXzf]u.(s//TO*ZmAvv>l@#lR.L]QEYL VFe^!HjlLqClf0e>^tvN*7<XAb[),FkdhvhDnw_g~^+s~cTTU I)uz|T^R->0nDApXv24SPe/m,!Q?*{u4A(*o&kc$<nobSS.BVCO=*|yf.K)c~`_YD*Z@/4.eRcxnT4<I`$kY|!tuw+I&`Cj[:![Y4H0p8WoKAuWnJFq`R+[Y,>}e{Nfy=&43#?^OMM2nB#L%pG.o5gAmy$q=|>e2;z%F7k]t+Kx{l.M1*1jEd^|Bg3c|Mrk&4W(Bk5o}uT;v.WU#e9uT~X:lFUGk+oQk>UboM`0#6iX^9jynT_U}~5pHitraL(9>ep;Vw2{@=hAj;~gy[!^Q:wk:lHt>,,aH#M$e<r50dlc(Idwt.';

return $data;