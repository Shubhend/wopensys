<?php

# No direct access
$secureSrcClassName  = 'WCFE\Modules\Editor\Model\EmergencyRestore';
( class_exists( $secureSrcClassName ) && ( get_class( $this ) == $secureSrcClassName ) && $this->isConfirmed() ) or die( 'Access Denied' );


return array( 'content' => 'PD9waHAKLyoqCiAqIFRoZSBiYXNlIGNvbmZpZ3VyYXRpb24gZm9yIFdvcmRQcmVzcwogKgogKiBUaGUgd3AtY29uZmlnLnBocCBjcmVhdGlvbiBzY3JpcHQgdXNlcyB0aGlzIGZpbGUgZHVyaW5nIHRoZQogKiBpbnN0YWxsYXRpb24uIFlvdSBkb24ndCBoYXZlIHRvIHVzZSB0aGUgd2ViIHNpdGUsIHlvdSBjYW4KICogY29weSB0aGlzIGZpbGUgdG8gIndwLWNvbmZpZy5waHAiIGFuZCBmaWxsIGluIHRoZSB2YWx1ZXMuCiAqCiAqIFRoaXMgZmlsZSBjb250YWlucyB0aGUgZm9sbG93aW5nIGNvbmZpZ3VyYXRpb25zOgogKgogKiAqIE15U1FMIHNldHRpbmdzCiAqICogU2VjcmV0IGtleXMKICogKiBEYXRhYmFzZSB0YWJsZSBwcmVmaXgKICogKiBBQlNQQVRICiAqCiAqIEBsaW5rIGh0dHBzOi8vd29yZHByZXNzLm9yZy9zdXBwb3J0L2FydGljbGUvZWRpdGluZy13cC1jb25maWctcGhwLwogKgogKiBAcGFja2FnZSBXb3JkUHJlc3MKICovCgovLyAqKiBNeVNRTCBzZXR0aW5ncyAtIFlvdSBjYW4gZ2V0IHRoaXMgaW5mbyBmcm9tIHlvdXIgd2ViIGhvc3QgKiogLy8KLyoqIFRoZSBuYW1lIG9mIHRoZSBkYXRhYmFzZSBmb3IgV29yZFByZXNzICovCmRlZmluZSggJ0RCX05BTUUnLCAnd29yZHByZXNzJyApOwoKLyoqIE15U1FMIGRhdGFiYXNlIHVzZXJuYW1lICovCmRlZmluZSggJ0RCX1VTRVInLCAncm9vdCcgKTsKCi8qKiBNeVNRTCBkYXRhYmFzZSBwYXNzd29yZCAqLwpkZWZpbmUoICdEQl9QQVNTV09SRCcsICcnICk7CgovKiogTXlTUUwgaG9zdG5hbWUgKi8KZGVmaW5lKCAnREJfSE9TVCcsICdsb2NhbGhvc3QnICk7CgovKiogRGF0YWJhc2UgQ2hhcnNldCB0byB1c2UgaW4gY3JlYXRpbmcgZGF0YWJhc2UgdGFibGVzLiAqLwpkZWZpbmUoICdEQl9DSEFSU0VUJywgJ3V0ZjhtYjQnICk7CgovKiogVGhlIERhdGFiYXNlIENvbGxhdGUgdHlwZS4gRG9uJ3QgY2hhbmdlIHRoaXMgaWYgaW4gZG91YnQuICovCmRlZmluZSggJ0RCX0NPTExBVEUnLCAnJyApOwoKIGRlZmluZSggJ0FMTE9XX1VORklMVEVSRURfVVBMT0FEUycsIHRydWUgKTsKLy8gZGVmaW5lKCAnQUxMT1dfVU5GSUxURVJFRF9VUExPQURTJywgdHJ1ZSApOwoKLyoqI0ArCiAqIEF1dGhlbnRpY2F0aW9uIFVuaXF1ZSBLZXlzIGFuZCBTYWx0cy4KICoKICogQ2hhbmdlIHRoZXNlIHRvIGRpZmZlcmVudCB1bmlxdWUgcGhyYXNlcyEKICogWW91IGNhbiBnZW5lcmF0ZSB0aGVzZSB1c2luZyB0aGUge0BsaW5rIGh0dHBzOi8vYXBpLndvcmRwcmVzcy5vcmcvc2VjcmV0LWtleS8xLjEvc2FsdC8gV29yZFByZXNzLm9yZyBzZWNyZXQta2V5IHNlcnZpY2V9CiAqIFlvdSBjYW4gY2hhbmdlIHRoZXNlIGF0IGFueSBwb2ludCBpbiB0aW1lIHRvIGludmFsaWRhdGUgYWxsIGV4aXN0aW5nIGNvb2tpZXMuIFRoaXMgd2lsbCBmb3JjZSBhbGwgdXNlcnMgdG8gaGF2ZSB0byBsb2cgaW4gYWdhaW4uCiAqCiAqIEBzaW5jZSAyLjYuMAogKi8KZGVmaW5lKCAnQVVUSF9LRVknLCAgICAgICAgICcxIENheDghTWlBQXs6YWN0OmVkJXJ2NiE2WW8jcExVKiA/YSh0Kik+PDZxOkgmJDNBMmlqdF9LIyhsd1FiRz0wJyApOwpkZWZpbmUoICdTRUNVUkVfQVVUSF9LRVknLCAgJzdTNWxlejs/X0Q7dExsPiUrMEN+Z0ZWOWorb2VLcD5te3tOeDFgWFddIVR0LSFYQmV3KSk4eSBKfEtlcio0REonICk7CmRlZmluZSggJ0xPR0dFRF9JTl9LRVknLCAgICAnPG9OW2U2PmUjPGxwPWV2c2pqciNHICA3VSk3MyZTL3oqfmhrIG93a0VaSjZwKlBFMlgtWUlmLVUuZUhHXmBUUScgKTsKZGVmaW5lKCAnTk9OQ0VfS0VZJywgICAgICAgICd1d1Eha0c0L3NTbDlQJHAqOiA/dD4yUm8yTSV3KW8/dCovUnAjQCM6bj9WKio8cjc/LlVxNlkhSUlgWVp1UGZ+JyApOwpkZWZpbmUoICdBVVRIX1NBTFQnLCAgICAgICAgJ005Ri5TTG5iYnR+ZiRTLDVLV0sjd0EjPG9naHNdZl0uKT99dkxJS1V5bjwrSC0kSFJ8O0ZpUjE4UzAwYW1gZDMnICk7CmRlZmluZSggJ1NFQ1VSRV9BVVRIX1NBTFQnLCAnLUo9TVJTcGFrZjIkPWE4Wy5wQG01ZG9yR0F+PS8lTFM/K05LK0NFbEZzX35be1laLn5waExTKlpEOkRpPSFYMCcgKTsKZGVmaW5lKCAnTE9HR0VEX0lOX1NBTFQnLCAgICdyV205dX1zL31uIW1lMD5HXndiVkxEMHk2ZUJ9dTFYIHNFJjo/KHMmP0F8MG1kLi0lclp2R1AkWz9CdzplI2tvJyApOwpkZWZpbmUoICdOT05DRV9TQUxUJywgICAgICAgJyF5O3dyVXhFZ099WDszezhIWjV5PGhnaHhadC9xa1pnSi9IMXQlPUJbfiokeVN+O1QzMVZFYiZfUHJHSEosU0InICk7CgovKiojQC0qLwoKLyoqCiAqIFdvcmRQcmVzcyBEYXRhYmFzZSBUYWJsZSBwcmVmaXguCiAqCiAqIFlvdSBjYW4gaGF2ZSBtdWx0aXBsZSBpbnN0YWxsYXRpb25zIGluIG9uZSBkYXRhYmFzZSBpZiB5b3UgZ2l2ZSBlYWNoCiAqIGEgdW5pcXVlIHByZWZpeC4gT25seSBudW1iZXJzLCBsZXR0ZXJzLCBhbmQgdW5kZXJzY29yZXMgcGxlYXNlIQogKi8KJHRhYmxlX3ByZWZpeCA9ICd3cF8yJzsKCi8qKgogKiBGb3IgZGV2ZWxvcGVyczogV29yZFByZXNzIGRlYnVnZ2luZyBtb2RlLgogKgogKiBDaGFuZ2UgdGhpcyB0byB0cnVlIHRvIGVuYWJsZSB0aGUgZGlzcGxheSBvZiBub3RpY2VzIGR1cmluZyBkZXZlbG9wbWVudC4KICogSXQgaXMgc3Ryb25nbHkgcmVjb21tZW5kZWQgdGhhdCBwbHVnaW4gYW5kIHRoZW1lIGRldmVsb3BlcnMgdXNlIFdQX0RFQlVHCiAqIGluIHRoZWlyIGRldmVsb3BtZW50IGVudmlyb25tZW50cy4KICoKICogRm9yIGluZm9ybWF0aW9uIG9uIG90aGVyIGNvbnN0YW50cyB0aGF0IGNhbiBiZSB1c2VkIGZvciBkZWJ1Z2dpbmcsCiAqIHZpc2l0IHRoZSBkb2N1bWVudGF0aW9uLgogKgogKiBAbGluayBodHRwczovL3dvcmRwcmVzcy5vcmcvc3VwcG9ydC9hcnRpY2xlL2RlYnVnZ2luZy1pbi13b3JkcHJlc3MvCiAqLwpkZWZpbmUoICdXUF9ERUJVRycsIGZhbHNlICk7CgovKiBUaGF0J3MgYWxsLCBzdG9wIGVkaXRpbmchIEhhcHB5IHB1Ymxpc2hpbmcuICovCgovKiogQWJzb2x1dGUgcGF0aCB0byB0aGUgV29yZFByZXNzIGRpcmVjdG9yeS4gKi8KaWYgKCAhIGRlZmluZWQoICdBQlNQQVRIJyApICkgewoJZGVmaW5lKCAnQUJTUEFUSCcsIF9fRElSX18gLiAnLycgKTsKfQoKLyoqIFNldHMgdXAgV29yZFByZXNzIHZhcnMgYW5kIGluY2x1ZGVkIGZpbGVzLiAqLwpyZXF1aXJlX29uY2UgQUJTUEFUSCAuICd3cC1zZXR0aW5ncy5waHAnOwo=' );